<div id="select_category" class="modalmask">
	<div class="modalbox movedown">
		<h3>Side Masters / Seleccionar Categorías</h3>
		<a href="#close" title="Close" class="close_">X</a>
		<div class="options-db">
            <ul id="nav">
                <?php
                    $ResultCategories = $SM->query("SELECT * FROM sm_category;");
                    while ($RowCat = $ResultCategories->fetch_array(MYSQLI_ASSOC)){
                        ?>
                            <li>
                                <a href="javascript: void;" class='sub' tabindex='1'>
                                    <img src='img/b_main.png' />
                                    <?php echo $RowCat['category_name']; ?>
                                </a>
                                <img src='img/up.gif' alt='' />
                                <ul type='circle'>
                                    <?php
                                        $ResultSubCategories = $SM->query("SELECT sub_category_name FROM sm_sub_category WHERE category_name='".$RowCat['category_name']."';");
                                        while ($RowSubCat = $ResultSubCategories->fetch_array(MYSQLI_ASSOC)){
                                            ?>
                                                <li>
                                                    <a href="javascript: void;" onclick="_category_selected('<?php echo @$RowSubCat['sub_category_name']; ?>')"> <img src="img/b_sub.png" alt="Icon"> <?php echo $RowSubCat['sub_category_name']; ?></a>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                        <?php
                    }
                ?>
            </ul>
        </div>

        <div class="selected">
              
            <textarea name="category_selected" id="category_selected" placeholder="Categorías..." required><?php
                    if (isset($_POST['ViewArticleForTitle'])){
                        $TagsList = "SELECT category FROM sm_article_categories WHERE title='".@$_POST['ViewArticleForTitle']."';";
                        $ResStep = $SM->query($TagsList);
                        $TagsOld = "";
                        if ($ResStep->num_rows > 0){
                            while ($ResEnd = $ResStep->fetch_array(MYSQLI_ASSOC)){
                                echo $ResEnd['category'].", ";
                                $TagsOld += $ResEnd['category'].", ";
                            }
                        }
                    } else if (isset($_GET['Selected_Categories'])){
                        echo $_GET['Selected_Categories'];
                    }
                ?></textarea>
        </div>
        <div class="options">
            <a class="clean" href="#select_category" onclick="_clean_category_selected()">Limpiar</a>
            <a class="save" href="#close">Guardar</a>
        </div>
    </div>
</div>