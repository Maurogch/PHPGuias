<table style="margin:0 auto">
    <thead>
        <th>Nombre del producto</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Agregar</th>
    </thead>
    <form action="<?=FRONT_ROOT?>Product/add" method="post">
    <tbody>
        <tr>
            <td><input type="text" name="productName" required></td>
            <td><input type="number" name="stock" min="0" required></td>
            <td><input type="number" name="price" min="0" required></td>
            <td>
            <select name="category">
            <?php 
            if(isset($categoryList)){
                foreach ($categoryList as $category) {
            ?>
                <option value="<?=$category->getIdCategory()?>"><?=$category->getCategoryName()?></option>
            <?php 
                }
            }
            ?>
            </select></td>
            <td><input type="submit" value="Agregar"></td>
        </tr>
    </tbody>
    </form>
</table style="margin:0 auto">

<table>
    <thead>
        <th>Nombre del producto</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Borrar</th>
    </thead>
    <tbody>
    <?php 
        if(isset($productList)){
            foreach ($productList as $product) {
        ?>
            <tr>
                <td><?=$product->getProductName()?></td>
                <td><?=$product->getStock()?></td>
                <td><?=$product->getPrice()?></td>
                <td><?=$product->getCategory()->getCategoryName()?></td>
                <td>
                    <form action="<?=FRONT_ROOT?>Product/delete" method="post">
                    <input type="hidden" name="idProduct" value="<?=$product->getIdProduct()?>">
                    <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        <?php 
            }
        }
        ?>
    </tbody>
</table>
<div style="margin:0 auto"><form action="<?=FRONT_ROOT?>Home/index" method="get"><button>Volver</button></form></div>