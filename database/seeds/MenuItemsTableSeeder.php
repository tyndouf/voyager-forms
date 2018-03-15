<?php

namespace Pvtl\VoyagerForms\Database\Seeds;

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->first();
        $formsMenuItem = MenuItem::firstOrNew(['route' => 'voyager-forms.forms.index']);

        if (!$formsMenuItem->exists) {
            $formsMenuItem->fill([
                'title' => 'Forms',
                'menu_id' => $menu->id,
                'url'     => '',
                'icon_class' => 'voyager-documentation',
                'order'   => 7,
            ])->save();
        }

        $enquiriesMenuItem = MenuItem::firstOrNew(['route' => 'voyager-forms.enquiries.index']);

        if (!$enquiriesMenuItem->exists) {
            $enquiriesMenuItem->fill([
                'title' => 'Enquiries',
                'menu_id' => $menu->id,
                'parent_id' => $formsMenuItem->id,
                'url'     => '',
                'icon_class' => 'voyager-mail',
                'order'   => 1,
            ])->save();
        }
    }
}
