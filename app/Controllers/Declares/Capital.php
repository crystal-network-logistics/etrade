<?php
namespace App\Controllers\Declares;
use App\Controllers\Base;

class Capital extends Base {
    function __construct() {
    }

    // 资金页面
    public function balance(){
        $this->actionAuth();
        return $this->display([
            'view_path' => '/Capital/index'
        ]);
    }

    // 可用全额记录
    public function balance_log_page(){
        $this->actionAuth();
        $db = new \App\Models\Declares\Balance();
        $P = $this->U();
        $P['searchField'] = 'comment';
        $data = $db->asObject()->search( $P )->whereAuth('customerid')->orderBy('created_at','desc')->paginates( $this->_page() , $this->_size() );
        foreach ( $data['data'] as $row ) {
            $customer_data = $db->from('customer',true)->where('id',$row->customerid)->first();
            $row->customername = $customer_data ? $customer_data['customername'] : '';
        }
        return $this->toJson($data);
    }

    // 每单余额
    public function per_balance(){
        $this->actionAuth();
        $data['customerid'] = $this->U('customerid');
        return $this->render([
            'view_path' => '/Capital/balance','data' => $data
        ]);
    }

    // 客户未分配金额
    public function unc_balance(){
        $this->actionAuth();
        $data['customerid'] = $this->U('customerid');
        return $this->render([
            'view_path' => '/Capital/unallocated','data' => $data
        ]);
    }
}
