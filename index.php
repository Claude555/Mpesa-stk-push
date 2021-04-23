<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>STK PUSH</h3>

<div>
  <form action="stkpay.php" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="jina" placeholder="Your name..">

    <label for="jina">Phone</label>
    <input type="text" id="jina" name="phone" placeholder="Your last name..">

    <label for="amount">Amount</label>
    <input type="text" id="amount" name="amount" placeholder="KES 1.65">
    <label for="amount">Email</label>
    <input type="text" id="Email" name="email" placeholder="Enter email..">
    
  
    <input type="submit" name="submit" value="Check Out">
  </form>
</div>

</body>
</html>
