# Product Inventory Manager - Laravel Controller Documentation

## Overview
This is a complete Laravel implementation of a Product Inventory Manager with full CRUD operations, search functionality, stock filtering, and API endpoints.

## Files Created

### 1. **ProductController.php**
   - Location: `app/Http/Controllers/ProductController.php`
   - Complete REST controller with 14 methods

### 2. **Product Model**
   - Location: `app/Models/Product.php`
   - Database model with helper methods and query scopes

### 3. **Migration**
   - Location: `database/migrations/2025_12_03_000000_create_products_table.php`
   - Creates products table with all necessary columns

### 4. **Routes**
   - Web routes updated in `routes/web.php`
   - API routes updated in `routes/api.php`

---

## ProductController Methods

### Web Controller Methods

#### 1. **index()**
- **Purpose**: Display all products
- **Route**: `GET /products`
- **Returns**: View with all products
- **Usage**: List all products in the inventory

#### 2. **create()**
- **Purpose**: Show form to create new product
- **Route**: `GET /products/create`
- **Returns**: Create product form view

#### 3. **store(Request $request)**
- **Purpose**: Save new product to database
- **Route**: `POST /products`
- **Validates**:
  - `name` (required, string, max 255)
  - `price` (required, numeric, min 0)
  - `quantity` (required, integer, min 0)
  - `category` (optional, string, max 255)
  - `description` (optional, string)
- **Returns**: Redirect to products list with success message

#### 4. **show(Product $product)**
- **Purpose**: Display single product details
- **Route**: `GET /products/{product}`
- **Returns**: Product detail view

#### 5. **edit(Product $product)**
- **Purpose**: Show form to edit product
- **Route**: `GET /products/{product}/edit`
- **Returns**: Edit product form view

#### 6. **update(Request $request, Product $product)**
- **Purpose**: Update product in database
- **Route**: `PUT/PATCH /products/{product}`
- **Validates**: Same as store method
- **Returns**: Redirect to products list with success message

#### 7. **destroy(Product $product)**
- **Purpose**: Delete product from database
- **Route**: `DELETE /products/{product}`
- **Returns**: Redirect to products list with success message

#### 8. **search(Request $request)**
- **Purpose**: Filter products by name or category
- **Route**: `GET /products/search?q=searchTerm`
- **Query Parameter**: `q` (search term)
- **Returns**: Products view with filtered results

#### 9. **filterByStock($status)**
- **Purpose**: Filter products by stock status
- **Route**: `GET /products/filter/{status}`
- **Status Options**:
  - `in-stock` - Products with quantity > 0
  - `low-stock` - Products with quantity 1-9
  - `out-of-stock` - Products with quantity = 0
- **Returns**: Products view with filtered results

### API Methods (JSON Responses)

#### 10. **apiIndex()**
- **Purpose**: Get all products as JSON
- **Route**: `GET /api/products`
- **Returns**: JSON array of all products

#### 11. **apiShow(Product $product)**
- **Purpose**: Get single product as JSON
- **Route**: `GET /api/products/{product}`
- **Returns**: JSON object of product

#### 12. **apiStore(Request $request)**
- **Purpose**: Create product via API
- **Route**: `POST /api/products`
- **Returns**: JSON object of created product (201 status)

#### 13. **apiUpdate(Request $request, Product $product)**
- **Purpose**: Update product via API
- **Route**: `PUT /api/products/{product}`
- **Returns**: JSON object of updated product

#### 14. **apiDestroy(Product $product)**
- **Purpose**: Delete product via API
- **Route**: `DELETE /api/products/{product}`
- **Returns**: JSON success message

---

## Product Model Features

### Attributes
- `id` - Primary key
- `name` - Product name
- `price` - Product price (decimal 10,2)
- `quantity` - Stock quantity
- `category` - Product category
- `description` - Product description
- `created_at` - Creation timestamp
- `updated_at` - Update timestamp

### Fillable Properties
```php
protected $fillable = ['name', 'price', 'quantity', 'category', 'description'];
```

### Helper Methods

#### Stock Status Methods
- **getStockStatus()** - Returns 'in-stock', 'low-stock', or 'out-of-stock'
- **isInStock()** - Returns boolean if product is in stock
- **isLowStock()** - Returns boolean if product has low stock (1-9 qty)
- **isOutOfStock()** - Returns boolean if product is out of stock

### Query Scopes
- **filterByName($name)** - Filter by product name
- **filterByCategory($category)** - Filter by category
- **inStock()** - Get in-stock products
- **lowStock()** - Get low-stock products
- **outOfStock()** - Get out-of-stock products

---

## Database Migration

### Products Table Structure
```sql
CREATE TABLE products (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT DEFAULT 0,
    category VARCHAR(255) NULLABLE,
    description TEXT NULLABLE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

---

## Routes Summary

### Web Routes
| Method | Route | Controller Method |
|--------|-------|-------------------|
| GET | /products | index |
| GET | /products/create | create |
| POST | /products | store |
| GET | /products/{product} | show |
| GET | /products/{product}/edit | edit |
| PUT/PATCH | /products/{product} | update |
| DELETE | /products/{product} | destroy |
| GET | /products/search?q=term | search |
| GET | /products/filter/{status} | filterByStock |

### API Routes
| Method | Route | Controller Method |
|--------|-------|-------------------|
| GET | /api/products | apiIndex |
| POST | /api/products | apiStore |
| GET | /api/products/{product} | apiShow |
| PUT | /api/products/{product} | apiUpdate |
| DELETE | /api/products/{product} | apiDestroy |

---

## Setup Instructions

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Create Views (templates needed)
Create the following Blade templates:
- `resources/views/products/index.blade.php`
- `resources/views/products/create.blade.php`
- `resources/views/products/edit.blade.php`
- `resources/views/products/show.blade.php`

### 3. Test the Application
```bash
php artisan serve
```

Then visit: `http://localhost:8000/products`

---

## Example Usage

### Create Product (Web)
```
POST /products
- name: "Laptop"
- price: 999.99
- quantity: 10
- category: "Electronics"
- description: "High-performance laptop"
```

### Search Products
```
GET /products/search?q=Laptop
```

### Filter by Stock
```
GET /products/filter/low-stock
```

### API - Get All Products
```
GET /api/products
```

### API - Create Product
```
POST /api/products
{
    "name": "Mouse",
    "price": 29.99,
    "quantity": 50,
    "category": "Accessories"
}
```

---

## Features Implemented

✅ **View Products** - Display all products with pagination support  
✅ **Add Products** - Create new products with validation  
✅ **Update Products** - Edit existing product details  
✅ **Delete Products** - Remove products with confirmation  
✅ **Filter by Name** - Search products by name or category  
✅ **Stock Status** - Track in-stock, low-stock, and out-of-stock items  
✅ **API Endpoints** - RESTful API for external integrations  
✅ **Validation** - Input validation on all operations  
✅ **Query Scopes** - Easy database querying with helper methods  

---

**Created**: December 3, 2025
**Version**: 1.0
**Framework**: Laravel 9+
