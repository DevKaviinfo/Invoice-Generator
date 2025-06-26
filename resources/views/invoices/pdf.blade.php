<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Invoice</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 14px;
      color: #212529;
      padding: 30px;
    }
    .header, .totals, .bank-info, .terms {
      margin-bottom: 30px;
    }
    .header {
      width: 120px;
      height: 120px;
      background-color: #343a40;
      color: white;
      font-weight: bold;
      font-size: 24px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
    }
    .header .company-info p, .client-info p {
      margin: 0;
      line-height: 1.3;
    }
    .client-info h6, .invoice-info h6 {
      font-weight: 700;
      margin-bottom: 10px;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 1px;
      color: #495057;
    }
    table {
      border-collapse: collapse;
    }
    table thead {
      background-color: #f8f9fa;
    }
    table thead th {
      border: 1px solid #dee2e6;
      padding: 10px;
      font-weight: 600;
    }
    table tbody td {
      border: 1px solid #dee2e6;
      padding: 10px;
    }
    table tbody tr:nth-child(even) {
      background-color: #fefefe;
    }
    .totals table {
      width: 100%;
    }
    .totals table td {
      padding: 8px 12px;
    }
    .totals .label {
      font-weight: 700;
      text-align: right;
    }
    .totals .value {
      font-weight: 700;
      text-align: right;
      background-color: #e9ecef;
    }
    .bank-info h6, .terms h6 {
      font-weight: 700;
      margin-bottom: 10px;
      text-transform: uppercase;
      font-size: 13px;
      color: #495057;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="row header align-items-center">
    <div class="col-md-8 company-info">
      <h3 class="mb-2">{{ $invoice->company_name }}</h3>
      <p>{{ $invoice->company_number }}</p>
      <p>{{ $invoice->company_mail }}</p>
      <p style="white-space: pre-line;">{!! nl2br(e($invoice->company_adress)) !!}</p>
    </div>
  </div>

  <!-- Billing & Invoice Info -->
  <div class="row mb-4">
    <div class="col-md-6 client-info">
      <h6>BILL TO</h6>
      <p>{{ $invoice->client_name }}</p>
      <p>{{ $invoice->client_number }}</p>
      <p>{{ $invoice->client_mail }}</p>
      <p style="white-space: pre-line;">{!! nl2br(e($invoice->client_address)) !!}</p>
    </div>
    <div class="col-md-6 invoice-info text-right">
      <h6>INVOICE</h6>
      <p><strong>Invoice No:</strong> {{ $invoice->invoice_number }}</p>
      <p><strong>Issue Date:</strong> {{ $invoice->invoice_date }}</p>
    </div>
  </div>

  <!-- Item Table -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Description</th>
        <th style="width: 80px;">Quantity</th>
        <th style="width: 120px;">Unit Price</th>
        <th style="width: 120px;">Amount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($invoice->items as $item)
      <tr>
        <td>{{ $item->description }}</td>
        <td class="text-center">{{ $item->quantity }}</td>
        <td class="text-right">{{ $invoice->currency }} {{ number_format($item->price, 2) }}</td>
        <td class="text-right">{{ $invoice->currency }} {{ number_format($item->price * $item->quantity, 2) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Totals -->
  <div class="row justify-content-end totals">
    <div class="col-md-4">
      <table>
        <tr>
          <td class="label">Subtotal:</td>
          <td class="value">{{ $invoice->currency }} {{ number_format($invoice->total_amount, 2) }}</td>
        </tr>
        <tr>
          <td class="label">VAT ({{ $invoice->tax }}%):</td>
          <td class="value">{{ $invoice->currency }} {{ number_format(($invoice->total_amount / 100) * $invoice->tax, 2) }}</td>
        </tr>
        <tr>
          <td class="label">Total:</td>
          <td class="value">{{ $invoice->currency }} {{ number_format((($invoice->total_amount / 100) * $invoice->tax) + $invoice->total_amount, 2) }}</td>
        </tr>
      </table>
    </div>
  </div>

  <!-- Terms -->
  <div class="terms">
    <h6>TERMS</h6>
    <p>{{ $invoice->notes }}</p>
  </div>

</body>
</html>
