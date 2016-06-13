<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;

class MenusController extends Controller
{
    protected $menu;
    protected $menuItem;

    public function __construct( Menu $menu, MenuItem $menuItem ) {
        $this->menu = $menu;
        $this->menuItem = $menuItem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menu->all();
        return view('administrator.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->menu->create($request->all());
        return redirect()->route('admin.menu.index')->with([
            'messages' => 'Add menu success',
            'type'  => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        return view('administrator.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = $this->menu->find($id);
        $menu->update($request->all());
        return redirect()->route('admin.menu.index')->with([
            'messages' => 'Update menu success',
            'type'  => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $menu = $this->menu->findOrFail($id);
         $menu->delete();
        return redirect()->route('admin.menu.index')->with([
            'messages' => 'Delete menu success',
            'type'  => 'success'
        ]);
    }

    public function publish () {
        if( \Request::ajax() ) {
            $id = \Request::get('id');
            $publish = \Request::get('publish');

            $menu = $this->menu->find($id);
            $menu->publish = $publish;
            $menu->save();

            return 'Publish update category success';
        }
    }

    public function getAddItem ( $id ) {

        $menuItem = $this->menuItem->where('menu_id', $id)->get()->toHierarchy();

        $cate_ar_id[] = '';
        $page_ar_id[] = '';

        foreach ($menuItem as $value) {
            $cate_ar_id[] = $value->category_id;
            $page_ar_id[] = $value->page_id;
        }

        $categories = \App\Models\Category::lists('name', 'id');
        $pages = \App\Models\Page::lists('name', 'id');

        $menuId = $id;
        
        return view( 'administrator.menu.addItem', compact('categories', 'pages', 'menuId', 'menuItem', 'cate_ar_id', 'page_ar_id') );
    }

    public function postAddItem () {
        if( \Request::ajax() ) {
            $tokenMisMatch = [
                'message' => 'Token invalid!' 
            ];
            if ( \Session::token() != \Request::get('_token')  ) {
                return response()->json( $tokenMisMatch );
            }

            $id = \Request::get('id');
            $category_id = \Request::get('category');
            $page_id = \Request::get('page');

            if( $category_id != '' && $page_id != '' ) {
                foreach ($category_id as $cid) {
                    $cinsert[] = [
                        'menu_id' => $id,
                        'category_id' => $cid,
                    ];
                }
                $this->menuItem->insert($cinsert);
                foreach ($page_id as $pid) {
                    $pinsert[] = [
                        'menu_id' => $id,
                        'page_id' => $pid
                    ];
                }
                $this->menuItem->insert($pinsert);
            } elseif( $category_id != '' && $page_id == '' ) {
                foreach ($category_id as $cid) {
                    $insert[] = [
                        'menu_id' => $id,
                        'category_id' => $cid
                    ];
                }
                $this->menuItem->insert($insert);
            } elseif( $category_id == '' && $page_id != '' ) {
                foreach ($page_id as $pid) {
                    $insert[] = [
                        'menu_id' => $id,
                        'page_id' => $pid
                    ];
                }
                $this->menuItem->insert($insert);
            } else {
                $response = [
                    'message' => 'No item is selected'
                ];
                return response()->json( $response );
            }

            $response = self::showItem($category_id, $page_id);

            return $response;

        } else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function postUpdate()
    {   
        if (\Request::ajax()) {
            $menu = json_decode(\Request::getContent());
            foreach ($menu as $p) {
                $item = $this->menuItem->findOrFail($p->id);
                $item->lft = $p->lft;
                $item->rgt = $p->rgt;
                $item->parent_id = $p->parent_id != "" ? $p->parent_id : null;
                $item->depth = $p->depth;
                $item->save();
            }

            $response = [
                'message' => 'Update Item menu success'
            ];

            return response()->json( $response ); 
        }
    }

    private static function showItem ( $category_id, $page_id ) {
        $category = \App\Models\Category::select('id', 'name')->whereIn('id', $category_id)->get();
        $page = \App\Models\Page::select('id', 'name')->whereIn('id', $page_id)->get();
        
        $response = [
            'category' => $category,
            'page' => $page,
            'message' => 'Add Item menu success'
        ];

        return response()->json( $response ); 
    }

}
