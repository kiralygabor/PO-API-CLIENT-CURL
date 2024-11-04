<?php

namespace App\Html;

class PageCounties extends AbstractPage
{

    static function table(array $entities)
    {
        echo '<h1>Megyék</h1>';
        self::searchBar();
        echo '<table id = "counties-table">';
        self::tableHead();
        self::tableBody($entities);
        echo "</table>";
    }

    static function tableHead()
    {
        echo '
        <thead>
            <th class = "id-col">#</th>
            <th> Megnevezés </th>
            <th style = "float: right; display: flex">
                Művelet&nbsp;
                <button id = "btn-add" title = "Új"><i class="fa fa-plus"></i></button>';

        echo '
                </th>
            </tr>
            <tr id = "editor" class = "hidden"">';
            self::editor();
            echo '
            </tr>
            </thead>
            ';
            
    }

    static function editor()
    {
        echo'
                <div class= "editor">
                    <th></th>
                    <th>
                        <form name="county-editor" method="post" action="" >
                            <input type="hidden" id="id" name="id">
                            <input type="search" id="name" name="name" placeholder="Megye" required>
                            <button type="submit" id="btn-save-county" name="btn-save-county" title="Ment">Mentés</button>
                            <button type="button" id="btn-cancel-county" title="Mégese">Mégse</button>
                        </form>
                    </th>
    
                    <th class="flex">

                    </th>
                </div>
        ';
    }

    static function tableBody(array $entities)
    {
        echo '<tbody>';
        $i = 0;
        foreach($entities as $entity )
        {
            echo "
                <tr class='" . (++$i % 2 ? "odd" : "even") . "'>
                    <td class = 'SorszamMezo'>{$entity['id']}</td>
                    <td class = 'MegyeMezo';>{$entity['name']}</td>
                    <td class = 'flex float-right'>
                        <form method='post' action='' class = 'ModositasBtn'>
                            <input type='hidden' name='edit_county_id' value='{$entity['id']}'>
                            <input type='hidden' name='edit_county_name' value='{$entity['name']}'>
                            <button type='submit' name='btn-edit-county' title='Módosít'><i class='fa fa-edit'></i></button>
                        </form>
                        <form method='post' action='' class = 'TorlesBtn'>
                            <button type='submit' id='btn-del-county-{$entity['id']}' name='btn-del-county' value='{$entity['id']}' title='Töröl'><i class='fa fa-trash'></i></button>
                        </form>
                    </td>
                </tr>";

        }
        echo '</tbody>';
    }

    static function showModifyCounties($id = null, $name = '')
{
    echo '
        <form method="post" action="">
            <input type="hidden" name="modified_county_id" value="' . htmlspecialchars($id) . '">
            <label for="modified_county_name">Megye neve:</label>
            <input type="text" name="modified_county_name" value="' . htmlspecialchars($name) . '">
            <button type="submit" name="btn-save-modified-county">Mentés</button>
        </form>';
}

} 