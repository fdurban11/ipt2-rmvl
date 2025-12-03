# Product Inventory Manager

A simple, user-friendly web application for managing product inventory. Track products, update quantities, manage pricing, and organize items by category.

## Features

✅ **View Products** - See all products in a beautiful card-based layout
✅ **Add Products** - Quickly add new products with name, price, quantity, and category
✅ **Update Products** - Edit any product's information
✅ **Delete Products** - Remove products with confirmation to prevent accidents
✅ **Filter by Name** - Search products in real-time as you type
✅ **Stock Indicators** - Visual indicators for in-stock, low-stock, and out-of-stock items
✅ **Persistent Storage** - All data is saved to browser localStorage

## How to Use

1. **Open the Application**
   - Open `index.html` in your web browser

2. **Add a Product**
   - Fill in the product details:
     - Product Name (required)
     - Price (required)
     - Quantity (required)
     - Category (optional)
   - Click "Add Product" button
   - The product will appear in the products list

3. **View All Products**
   - Products are displayed as cards showing:
     - Product name
     - Price
     - Quantity
     - Category
     - Stock status indicator

4. **Filter Products**
   - Type in the search box to filter products by name
   - Leave the search box empty to see all products

5. **Update a Product**
   - Click the "Edit" button on any product card
   - The form will populate with the product's current data
   - Make your changes and click "Update Product"
   - Click "Cancel Edit" to discard changes

6. **Delete a Product**
   - Click the "Delete" button on any product card
   - Confirm the deletion when prompted
   - The product will be removed from the inventory

## Stock Indicators

- **✓ In Stock** (Green) - Quantity is 10 or more
- **⚠️ Low Stock** (Yellow) - Quantity is between 1 and 9
- **❌ Out of Stock** (Red) - Quantity is 0

## Data Storage

All product data is automatically saved to your browser's localStorage. This means:
- Your products will persist even if you close the browser
- Data is stored locally on your computer
- Clearing browser data will delete your products

## Browser Compatibility

Works on all modern browsers that support:
- HTML5
- CSS3 (Grid, Flexbox)
- JavaScript ES6
- localStorage API

## Technical Details

- **Frontend Framework**: Vanilla JavaScript (No dependencies)
- **Storage**: Browser localStorage
- **Styling**: CSS3 with responsive design
- **Responsive**: Works on desktop, tablet, and mobile devices

## File Structure

```
ProductInventoryManager/
├── index.html    - Main HTML structure
├── style.css     - All styling and layout
├── script.js     - JavaScript functionality
└── README.md     - This file
```

## Tips

- Use categories to organize your inventory (e.g., Electronics, Clothing, Food)
- Keep an eye on low-stock items to reorder when needed
- The search feature is case-insensitive and searches as you type
- All changes are automatically saved

---

**Created**: December 2025
**Version**: 1.0
**Last Updated**: December 3, 2025
