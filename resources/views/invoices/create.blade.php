<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PDF Invoice Generator</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  
  <style>
    /* Gradient background from login form */
    .gradient-custom {
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
      min-height: 100vh;
      padding-top: 40px;
      padding-bottom: 40px;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Card styling like login */
    .card {
      background-color: #212529; /* dark bg */
      color: white;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.4);
      max-width: 900px;
      margin: auto;
    }

    /* Headings */
    .invoice-title {
      font-weight: 700;
      color: #fff;
      margin-bottom: 1rem;
      text-align: center;
      text-transform: uppercase;
    }

    label {
      color: #ddd;
      font-weight: 600;
    }

    .form-control {
      border-radius: 8px;
      background-color: #343a40;
      border: 1px solid #444;
      color: white;
    }

    .form-control::placeholder {
      color: #bbb;
    }

    .form-control:focus {
      background-color: #495057;
      color: white;
      border-color: #6f42c1;
      box-shadow: none;
    }

    .btn-primary {
      border-radius: 20px;
      background-color: #6f42c1;
      border: none;
      font-weight: 600;
    }
    .btn-primary:hover {
      background-color: #5936a8;
    }

    .line {
      margin: 1.5rem 0;
      height: 1px;
      background:
        repeating-linear-gradient(90deg, #bb86fc 0 5px, #0000 0 7px);
    }

    /* Button + and - styling */
    .btn-success {
      border-radius: 20px;
    }
    .btn-danger {
      border-radius: 20px;
    }
  </style>
</head>
<body>

<div class="gradient-custom">
  <div class="card shadow-lg p-4">
    <h4 class="invoice-title">PDF Invoice Generator</h4>
    <form action="/invoices" method="POST">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="invoiceNumber">Invoice Number</label>
          <span class="badge badge-warning"><i class="bi bi-arrow-90deg-down"></i> Invoice number you can change</span>
          <input type="text" class="form-control" name="invoice_number" id="invoiceNumber" value="{{$invoiceNumber}}" placeholder="INV-001">
        </div>
        <div class="form-group col-md-3">
          <label for="invoiceDate">Date</label>
          <input type="date" class="form-control" name="invoice_date" id="invoiceDate" value="{{$date}}">
        </div>
        <div class="form-group col-md-3">
          <label for="invoiceTime">Time</label>
          <input type="time" class="form-control" name="invoice_time" id="invoiceTime" value="{{$time}}">
        </div>
      </div>
      
      <div class="line"></div>
      
      <!-- Invoice Info -->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="companyName">Company Name</label>
          <input type="text" class="form-control" name="company_name" id="companyName" placeholder="ABC-Company">
        </div>
        <div class="form-group col-md-6">
          <label for="companyNumber">Company Contact Number</label>
          <input type="text" class="form-control" name="company_number" id="companyNumber" placeholder="+XX XXX XXXX">
        </div>
        <div class="form-group col-md-12">
          <label for="companyMail">Company Email</label>
          <input type="text" class="form-control" name="company_mail" id="companyMail" placeholder="company@mail.mail">
        </div>
        <div class="form-group col-md-12">
          <label for="companyAdress">Company Address</label>
          <textarea class="form-control" name="company_adress" id="companyAdress" placeholder="123 Main St, City, Country"></textarea>
        </div>
      </div>
      
      <div class="line"></div>
      
      <!-- Client Info -->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="clientName">Client Name</label>
          <input type="text" class="form-control" name="client_name" id="clientName" placeholder="John Doe">
        </div>
        <div class="form-group col-md-6">
          <label for="clientNumber">Client Contact Number</label>
          <input type="text" class="form-control" name="client_number" id="clientNumber" placeholder="+XX XXX XXXX">
        </div>
        <div class="form-group col-md-12">
          <label for="clientMail">Client Email</label>
          <input type="text" class="form-control" name="client_mail" id="clientMail" placeholder="client@mail.mail">
        </div>
        <div class="form-group col-md-12">
          <label for="clientAdress">Client Address</label>
          <textarea class="form-control" name="client_adress" id="clientAdress" rows="2" placeholder="123 Main St, City, Country"></textarea>
        </div>
      </div>
      
      <div class="line"></div>
      
      <!-- Invoice Items -->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="currency">Currency</label>
          <input type="text" class="form-control" name="currency" id="currency" placeholder="RS.">
        </div>
        <div class="form-group col-md-6">
          <label for="tax">Tax Percentage</label>
          <input type="text" class="form-control" name="tax" id="tax" placeholder="10">
        </div>
      </div>
      
      <div class="form-group">
        <label>Items</label>
        <div class="form-row">
          <div class="col-md-5 mb-2">
            <input type="text" class="form-control" name="items[0][description]" placeholder="Description" required>
          </div>
          <div class="col-md-2 mb-2">
            <input type="number" class="form-control" name="items[0][quantity]" placeholder="Qty" required>
          </div>
          <div class="col-md-3 mb-2">
            <input type="number" class="form-control" name="items[0][price]" placeholder="Unit Price" required>
          </div>
          <div class="col-md-2 mb-2">
            <button type="button" class="btn btn-success btn-block" onclick="addItem()">+</button>
          </div>
        </div>
        <div id="additionalItems"></div>
      </div>
      
      <div class="line"></div>
      
      <!-- Notes -->
      <div class="form-group">
        <label for="notes">Additional Notes (Terms & Condition)</label>
        <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Optional notes about payment, delivery, etc."></textarea>
      </div>
      
      <!-- Submit -->
      <button type="submit" class="btn btn-primary btn-block">Generate PDF</button>
    </form>
  </div>
</div>

<script>
let index = 1;
function addItem() {
  const html = `
    <div class="form-row">
      <div class="col-md-5 mb-2">
        <input type="text" class="form-control" name="items[${index}][description]" placeholder="Description">
      </div>
      <div class="col-md-2 mb-2">
        <input type="number" class="form-control" name="items[${index}][quantity]" placeholder="Qty">
      </div>
      <div class="col-md-3 mb-2">
        <input type="number" class="form-control" name="items[${index}][price]" placeholder="Unit Price">
      </div>
      <div class="col-md-2 mb-2">
        <button type="button" class="btn btn-danger btn-block" onclick="this.parentNode.parentNode.remove()">−</button>
      </div>
    </div>`;
  document.getElementById('additionalItems').insertAdjacentHTML('beforeend', html);
  index++;
}
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
