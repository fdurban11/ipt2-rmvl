// Product Inventory Manager - JavaScript

class ProductInventory {
    constructor() {
        this.products = this.loadProducts();
        this.editingId = null;
        this.initializeEventListeners();
        this.displayProducts();
    }

    // Load products from localStorage
    loadProducts() {
        const stored = localStorage.getItem('products');
        return stored ? JSON.parse(stored) : [];
    }

    // Save products to localStorage
    saveProducts() {
        localStorage.setItem('products', JSON.stringify(this.products));
    }

    // Add a new product
    addProduct(name, price, quantity, category) {
        const product = {
            id: Date.now(),
            name,
            price: parseFloat(price),
            quantity: parseInt(quantity),
            category: category || 'Uncategorized',
            createdAt: new Date().toLocaleDateString()
        };
        this.products.push(product);
        this.saveProducts();
        return product;
    }

    // Update an existing product
    updateProduct(id, name, price, quantity, category) {
        const product = this.products.find(p => p.id === id);
        if (product) {
            product.name = name;
            product.price = parseFloat(price);
            product.quantity = parseInt(quantity);
            product.category = category || 'Uncategorized';
            this.saveProducts();
            return true;
        }
        return false;
    }

    // Delete a product
    deleteProduct(id) {
        this.products = this.products.filter(p => p.id !== id);
        this.saveProducts();
    }

    // Filter products by name
    filterProducts(searchTerm) {
        return this.products.filter(p =>
            p.name.toLowerCase().includes(searchTerm.toLowerCase())
        );
    }

    // Get all products
    getAllProducts() {
        return this.products;
    }

    // Display products in the UI
    displayProducts(productsToDisplay = null) {
        const container = document.getElementById('productsContainer');
        const displayList = productsToDisplay || this.products;

        if (displayList.length === 0) {
            container.innerHTML = '<p class="empty-message">No products found. Add one to get started!</p>';
            return;
        }

        container.innerHTML = displayList.map(product => this.createProductCard(product)).join('');
        this.attachEventListeners();
    }

    // Create HTML for a product card
    createProductCard(product) {
        const stockStatus = this.getStockStatus(product.quantity);
        const stockClass = product.quantity === 0 ? 'out-of-stock' : 
                          product.quantity < 10 ? 'low-stock' : 'in-stock';
        
        return `
            <div class="product-card">
                <h3>${this.escapeHtml(product.name)}</h3>
                <div class="product-info">
                    <strong>Price:</strong> $${product.price.toFixed(2)}
                </div>
                <div class="product-info">
                    <strong>Quantity:</strong> ${product.quantity}
                </div>
                <div class="product-info">
                    <strong>Category:</strong> ${this.escapeHtml(product.category)}
                </div>
                <div class="quantity-indicator ${stockClass}">
                    ${stockStatus}
                </div>
                <div class="product-actions">
                    <button class="btn-edit" onclick="inventory.editProduct(${product.id})">Edit</button>
                    <button class="btn-delete" onclick="inventory.confirmDelete(${product.id})">Delete</button>
                </div>
            </div>
        `;
    }

    // Get stock status message
    getStockStatus(quantity) {
        if (quantity === 0) {
            return '❌ Out of Stock';
        } else if (quantity < 10) {
            return '⚠️ Low Stock';
        } else {
            return '✓ In Stock';
        }
    }

    // Edit a product
    editProduct(id) {
        const product = this.products.find(p => p.id === id);
        if (product) {
            document.getElementById('productName').value = product.name;
            document.getElementById('productPrice').value = product.price;
            document.getElementById('productQuantity').value = product.quantity;
            document.getElementById('productCategory').value = product.category;
            document.getElementById('formTitle').textContent = 'Edit Product';
            document.getElementById('submitBtn').textContent = 'Update Product';
            document.getElementById('cancelBtn').style.display = 'inline-block';
            this.editingId = id;
            document.getElementById('productName').focus();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    // Confirm and delete a product
    confirmDelete(id) {
        const product = this.products.find(p => p.id === id);
        if (product && confirm(`Are you sure you want to delete "${product.name}"?`)) {
            this.deleteProduct(id);
            this.displayProducts();
        }
    }

    // Attach event listeners to product cards
    attachEventListeners() {
        // Event listeners are attached inline in the HTML for now
    }

    // Escape HTML to prevent XSS
    escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
    }

    // Initialize event listeners
    initializeEventListeners() {
        document.getElementById('productForm').addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleFormSubmit();
        });

        document.getElementById('cancelBtn').addEventListener('click', () => {
            this.cancelEdit();
        });

        document.getElementById('filterInput').addEventListener('input', (e) => {
            const searchTerm = e.target.value;
            if (searchTerm.trim() === '') {
                this.displayProducts();
            } else {
                const filtered = this.filterProducts(searchTerm);
                this.displayProducts(filtered);
            }
        });
    }

    // Handle form submission
    handleFormSubmit() {
        const name = document.getElementById('productName').value.trim();
        const price = document.getElementById('productPrice').value;
        const quantity = document.getElementById('productQuantity').value;
        const category = document.getElementById('productCategory').value.trim();

        if (!name || !price || quantity === '') {
            alert('Please fill in all required fields!');
            return;
        }

        if (this.editingId !== null) {
            this.updateProduct(this.editingId, name, price, quantity, category);
            this.cancelEdit();
        } else {
            this.addProduct(name, price, quantity, category);
        }

        document.getElementById('productForm').reset();
        this.displayProducts();
    }

    // Cancel edit mode
    cancelEdit() {
        this.editingId = null;
        document.getElementById('productForm').reset();
        document.getElementById('formTitle').textContent = 'Add New Product';
        document.getElementById('submitBtn').textContent = 'Add Product';
        document.getElementById('cancelBtn').style.display = 'none';
        document.getElementById('filterInput').value = '';
        this.displayProducts();
    }
}

// Helper function
function resetForm() {
    document.getElementById('productForm').reset();
}

// Initialize the inventory manager when the page loads
let inventory;
document.addEventListener('DOMContentLoaded', () => {
    inventory = new ProductInventory();
});
