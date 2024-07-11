<!DOCTYPE html>
<html lang="en">
    <script>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    border-left: 5px solid #3498db;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

li span {
    font-weight: bold;
}


    </script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Transaksi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>History Transaksi</h1>
        <ul id="transaction-list"></ul>
    </div>

    <script src="script.js">
        // Contoh data transaksi (dapat diambil dari server/API)
const transactions = [
    { id: 1, amount: 500, type: 'credit', date: '2024-07-10' },
    { id: 2, amount: 200, type: 'debit', date: '2024-07-09' },
    { id: 3, amount: 1000, type: 'credit', date: '2024-07-08' }
];

const transactionList = document.getElementById('transaction-list');

// Fungsi untuk menampilkan transaksi
function renderTransactions() {
    transactionList.innerHTML = ''; // Kosongkan daftar transaksi sebelumnya

    transactions.forEach(transaction => {
        const li = document.createElement('li');
        li.innerHTML = `
            <span>Transaction ID: ${transaction.id}</span><br>
            Amount: ${transaction.amount}<br>
            Type: ${transaction.type}<br>
            Date: ${transaction.date}
        `;
        transactionList.appendChild(li);
    });
}

// Panggil fungsi untuk menampilkan transaksi saat halaman dimuat
document.addEventListener('DOMContentLoaded', renderTransactions);

    </script>
</body>
</html>
