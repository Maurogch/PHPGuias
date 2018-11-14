<table style="margin:0 auto">
    <thead>
        <th>Nombre de Categoría</th>
        <th>Agregar</th>
    </thead>
    <tbody>
    <form action="<?=FRONT_ROOT?>Category/add" method="post">
        <tr>
            <td><input type="text" name="categoryName" required></td>
            <td><input type="submit" value="Agregar"></td>
        </tr>
    </form>
    </tbody>
</table>
<table style="margin:0 auto">
    <thead>
        <th>Nombre de Categoría</th>
        <th>Borrar</th>
    </thead>
    <tbody>
        <?php
        if(isset($categoryList)){
            foreach ($categoryList as $category) {
        ?>   
            <tr>
                <td><?=$category->getCategoryName()?></td>
                <td>
                    <form action="<?=FRONT_ROOT?>Category/delete" method="post">
                        <input type="hidden" name="idCategory" value="<?=$category->getIdCategory()?>">
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