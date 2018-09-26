<?php
    require_once("Config/autoload.php");

    use Model\Product as Product;
    use Model\Bill as Bill;
    use Repository\BillRepository as BillRepository;

    $product = new Product();
    $product2 = new Product();
    $bill = new Bill();
    $billRepository = new BillRepository();

    $product->setPrice(1)->setQuantity(10);
    $product2->setPrice(10)->setQuantity(10);

    $bill->AddProduct($product);
    $bill->AddProduct($product2);

    $billRepository->Add($bill);

    echo "Subtotal: ".$product->getSubTotal()."<br>";
    echo "Total: ".$product->getTotal()."<br>";

    var_dump($bill->getProductList());

    echo $bill->SubTotalCost()."<br>";
    echo $bill->TotalCost()."<br>";

    var_dump($billRepository->GetAll());

?>