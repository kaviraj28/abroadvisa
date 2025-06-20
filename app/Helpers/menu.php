<?php
if (!function_exists('get_the_menu')) {
    function get_the_menu($id = null, $class = null)
    {
        if ($id == null) {
            return null;
        }
        $menus = menuData($id);
        $navClass = $class ? $class : '';
        if ($menus) { ?>
            <ul class="<?= $navClass ?>">
                <?php foreach ($menus as $key => $value) {
                    $mainclass = isset($value->children) ? 'dropdown' : '';  ?>
                    <li class="<?= $mainclass ?>">
                        <a href="<?= $value->slug ?>" target="<?= $value->target ?? '_self' ?>"><?= $value->name ?? $value->title ?>
                            <?php if (isset($value->children)) { ?>
                                <i class="fa fa-angle-down"></i>
                            <?php } ?>
                        </a>
                        <?php if (isset($value->children)) { ?>
                            <ul class="sub-menu">
                                <?php foreach ($value->children[0] as $key => $data) {
                                    $subclass = isset($data->children) ? 'dropdown' : '';
                                ?>
                                    <li class="<?= $subclass ?>">
                                        <a href="<?= $data->slug ?>" target="<?= $data->target ?? '_self' ?>">
                                            <?= $data->name ?? $data->title ?>
                                        </a>
                                        <?php if (isset($data->children)) { ?>
                                            <ul class="sub-menu">
                                                <?php foreach ($data->children[0] as $key => $subdata) { ?>
                                                    <li>
                                                        <a href="<?= $subdata->slug ?>" target="<?= $subdata->target ?? '_self' ?>">
                                                            <?= $subdata->name ?? $subdata->title ?>
                                                        </a>
                                                        <?php if (isset($subdata->children)) { ?>
                                                            <ul class="sub-menu">
                                                                <?php foreach ($subdata->children[0] as $key => $sbchild) { ?>
                                                                    <li>
                                                                        <a class="nav-link<?= isset($sbdata->children) ? ' d-flex flex-between' : '' ?>"
                                                                            href="<?= $sbchild->slug ?>" target="<?= $sbchild->target ?? '_self' ?>">
                                                                            <?= $sbchild->name ?? $sbchild->title ?>
                                                                            <?= isset($sbchild->children) ? '<i class="fa-solid fa-angle-right small"></i>' : ''
                                                                            ?>
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
<?php }
    }
}
