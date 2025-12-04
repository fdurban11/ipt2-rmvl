import React from 'react';
import ReactDOM from 'react-dom';

function App() {
    return (
        <div className="container">
            <div className="hero" style={{ textAlign: 'center', color: 'white', minHeight: '100vh', display: 'flex', flexDirection: 'column', justifyContent: 'center', fontFamily: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif", background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' }}>
                
                <i className="fas fa-boxes" style={{ fontSize: '4rem', marginBottom: '1rem' }}></i>
                <h1 style={{ fontSize: '3.5rem', fontWeight: '700', marginBottom: '1rem', textShadow: '2px 2px 4px rgba(0,0,0,0.3)' }}>
                    Product Inventory Manager
                </h1>
                <p style={{ fontSize: '1.3rem', marginBottom: '2rem', opacity: 0.95 }}>
                    Manage your products efficiently with our simple and powerful inventory system
                </p>

                <div>
                    <a href="/products" className="btn btn-large btn-primary-custom me-2">
                        <i className="fas fa-list"></i> View Products
                    </a>
                    <a href="/products/create" className="btn btn-large btn-secondary-custom">
                        <i className="fas fa-plus"></i> Add Product
                    </a>
                </div>

                <div className="features mt-5 d-flex flex-wrap justify-content-center gap-3">
                    <div className="feature-card p-4 text-center" style={{ background: 'rgba(255,255,255,0.1)', borderRadius: '10px', backdropFilter: 'blur(10px)' }}>
                        <i className="fas fa-search" style={{ fontSize: '2rem', marginBottom: '1rem', color: '#ffd700' }}></i>
                        <h3>Search</h3>
                        <p>Find products quickly by name or category</p>
                    </div>
                    <div className="feature-card p-4 text-center" style={{ background: 'rgba(255,255,255,0.1)', borderRadius: '10px', backdropFilter: 'blur(10px)' }}>
                        <i className="fas fa-filter" style={{ fontSize: '2rem', marginBottom: '1rem', color: '#ffd700' }}></i>
                        <h3>Filter</h3>
                        <p>Filter by stock status in seconds</p>
                    </div>
                    <div className="feature-card p-4 text-center" style={{ background: 'rgba(255,255,255,0.1)', borderRadius: '10px', backdropFilter: 'blur(10px)' }}>
                        <i className="fas fa-plus-circle" style={{ fontSize: '2rem', marginBottom: '1rem', color: '#ffd700' }}></i>
                        <h3>Add</h3>
                        <p>Create new products with detailed info</p>
                    </div>
                    <div className="feature-card p-4 text-center" style={{ background: 'rgba(255,255,255,0.1)', borderRadius: '10px', backdropFilter: 'blur(10px)' }}>
                        <i className="fas fa-edit" style={{ fontSize: '2rem', marginBottom: '1rem', color: '#ffd700' }}></i>
                        <h3>Edit</h3>
                        <p>Update product information anytime</p>
                    </div>
                    <div className="feature-card p-4 text-center" style={{ background: 'rgba(255,255,255,0.1)', borderRadius: '10px', backdropFilter: 'blur(10px)' }}>
                        <i className="fas fa-trash" style={{ fontSize: '2rem', marginBottom: '1rem', color: '#ffd700' }}></i>
                        <h3>Delete</h3>
                        <p>Remove products from inventory</p>
                    </div>
                    <div className="feature-card p-4 text-center" style={{ background: 'rgba(255,255,255,0.1)', borderRadius: '10px', backdropFilter: 'blur(10px)' }}>
                        <i className="fas fa-chart-line" style={{ fontSize: '2rem', marginBottom: '1rem', color: '#ffd700' }}></i>
                        <h3>Track</h3>
                        <p>Monitor stock levels and availability</p>
                    </div>
                </div>

            </div>
        </div>
    );
}

ReactDOM.render(<App />, document.getElementById('app'));
