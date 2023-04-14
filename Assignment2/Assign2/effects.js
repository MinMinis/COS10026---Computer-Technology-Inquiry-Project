
const productCosts = {
  'EA SPORTS FIFA 23': 10,
  'League of Legends': 20,
  'Valorant': 30
};
const productPrices = {
  'EA SPORTS FIFA 23': 100,
  'League of Legends': 200,
  'Valorant': 300
};

function showFields() {
  var hireFields1 = document.getElementById("hire-fields1");
  var hireFields2 = document.getElementById("hire-fields2");
  var buyFields1 = document.getElementById("buy-fields1");
  var buyFields2 = document.getElementById("buy-fields2");
  var product = document.getElementById("product").value;
  var transactionType = document.getElementById("transaction-type").value;
  
  if ((product && transactionType) || (transactionType && product)) {
    if (transactionType === "hire") {
      hireFields1.style.display = "block";
      hireFields2.style.display = "block";
      buyFields1.style.display = "none";
      buyFields2.style.display = "none";
      updateTotalCost();
    } else if (transactionType === "buy") {
      hireFields1.style.display = "none";
      hireFields2.style.display = "none";
      buyFields1.style.display = "block";
      buyFields2.style.display = "block";
      updatePrice();
    }
  }
}
function calculateTotalCost() {
  var days = document.getElementById("days").value;
  var productName = document.getElementById("product").value;
  var productCost = productCosts[productName];
  document.getElementById("quantity").addEventListener("input", calculatePrice);
  var totalCost = days * productCost;
  document.getElementById("Total_Cost").value = totalCost;
}
function updateTotalCost() {
  var cost = document.getElementById("Total_Cost").value;
  document.getElementById("Total_Cost").value = cost;
}
function calculatePrice() {
  var days = document.getElementById("quantity").value;
  var productName = document.getElementById("product").value;
  var productPrice = productPrices[productName];
  document.getElementById("days").addEventListener("input", calculateTotalCost);
  var totalPrice = days * productPrice;
  document.getElementById("Price").value = totalPrice;
}
function updatePrice() {
  var price = document.getElementById("Price").value;
  document.getElementById("Price").value = price;
}

document.getElementById("days").addEventListener("input", calculateTotalCost);
document.getElementById("quantity").addEventListener("input", calculatePrice);

showFields();
