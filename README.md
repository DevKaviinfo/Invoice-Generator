<p align="center">
  <img src="https://img.icons8.com/ios-filled/500/pdf.png" width="90" alt="Invoice Logo">
</p>

<h1 align="center">📄 Invoice Generator</h1>

<p align="center">
  A clean and professional <strong>PDF Invoice Generator</strong> made for small businesses, freelancers, and billing purposes.
</p>

<p align="center">
  <a href="https://github.com/DevKaviinfo/Invoice-Generator"><img src="https://img.shields.io/github/stars/DevKaviinfo/Invoice-Generator?style=social" alt="GitHub stars"></a>
  <a href="https://github.com/DevKaviinfo/Invoice-Generator"><img src="https://img.shields.io/github/forks/DevKaviinfo/Invoice-Generator?style=social" alt="GitHub forks"></a>
  <a href="#"><img src="https://img.shields.io/badge/PDF-ready-brightgreen.svg" alt="PDF Export Ready"></a>
  <a href="#"><img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="MIT License"></a>
</p>

---

## 🚀 Overview

This system helps you generate stylish and professional invoices using your own billing data.  
Built with Bootstrap 4 and designed for easy customization, it's ideal for freelance services or company invoicing with PDF export support.

---

## ✨ Features

- 🧾 Dynamic Invoice Templates
- 🏢 Company & Client Information Sections
- 📦 Itemized Product/Service Table
- 🔢 Subtotal, Tax, and Total Calculation
- 📝 Custom Terms and Payment Notes (`{{ $invoice->note }}`)
- 🖨️ Print & PDF Export Ready
- 🎨 Styled using Bootstrap 4 for clean output

---

## 📸 Screenshot

<p align="center">
  <img src="https://raw.githubusercontent.com/DevKaviinfo/Invoice-Generator/main/sampleimage/image.png" alt="Invoice Preview" width="700">
</p>


---

## ⚙️ Installation

1. **Clone the repository**

   ```bash
    git clone https://github.com/DevKaviinfo/Invoice-Generator.git
    cd Invoice-Generator

2. **Install dependencies**

   ```bash
    composer install

3. **Set up environment**

   ```bash
    cp .env.example .env
    php artisan key:generate

4. **Migrate**

   ```bash
    php artisan migrate

5. **Run the application**

   ```bash
    php artisan serve

6. **Visit: http://localhost:8000**

