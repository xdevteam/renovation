<!-- Main Content -->
<div id="main">
    <div class="container wf-wrap">

        <div class="row">

            <section id="cabinet-content" class="clearfix">
                <h2 class="cabinetHead">Редактировать товары</h2>

                <div class="col-sm-12">    
                    <?php
                    if (!empty($product)) {
                        ?>
                        <form action="<?= base_url() ?>set_item" method="POST">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-sm-1">№</th>
                                        <th class="col-sm-5">Название</th>
                                        <th class="col-sm-2">Фото</th>
                                        <th class="col-sm-4">Управление</th>
                                    </tr>
                                </thead>
                                <tbody class="sortable">
                                    <?php
                                    foreach ($product as $item) {
                                        if ($item['status'] == 'enable') {
                                            $btn = 'Скрыть';
                                            $icon='<span class="fa fa-eye-slash"></span>';
                                        } else {
                                            $btn = 'Показать';
                                             $icon='<span class="fa fa-eye"></span>';
                                        }
                                        ?>                            
                                        <tr>
                                            <td>1</td>
                                            <td class="lead"><?= $item['name'] ?></td>
                                            <td>
                                                <img class="thumbnail" src="<?= $item['image_path'] ?>" width="100" height="100">
                                            </td>
                                            <td>
                                                <div class="btn-group">

                                                    <button type="button" class="btn btn-warning">
                                                        <span class="btn-text">Редактировать</span>
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>

                                                    <button type="submit"  name="del[<?= $item['id'] ?>]" value="<?= $item['id'] ?>" class="btn btn-danger">
                                                        <span class="btn-text">Удалить</span>
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>

                                                    <button type="submit"  name="hide[<?= $item['id'] ?>]" value="<?= $item['status'] ?>" class="btn btn-default">
                                                        <span class="btn-text"><?=$btn?></span>
                                                        <?=$icon?>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </form>
                        <?php
                    } else {
                        echo '<h2>Вы не разместили ни одного товара!</h2>';
                    }
                    ?>
                </div>

            </section>

        </div>

    </div>
</div>