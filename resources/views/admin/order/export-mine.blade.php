<table>
    <thead>
    <tr role="row">

        <th>ردیف</th>
        <th>شماره سفارش</th>


        <th> نام و نام خانوادگی کاربر </th>
        <th> شهر </th>
        <th> تاریخ فاکتور </th>
        <th> مبلغ کل </th>
        <th> مبلغ حمل و نقل </th>
        <th> درگاه بانک  </th>
        <th> وضعیت </th>
        
    </tr>
    </thead>
    <tbody>
        @foreach($orders as $key=>$row)

            <tr>
            
                <td>  {{$key+1}} </td>
                <td>  {{$row->id}} </td>
                <td>  {{@$row->user->name . ' ' .@$row->user->family }} </td>
                <td>  {{@$row->city->name}} </td>
                <td>  {{jdate('H:i Y/m/d',\Carbon\Carbon::parse(@$row->created_at2)->timestamp)}} </td>
                <td>  {{number_format($row->payment) . ' تومان '}} </td>
                
                <td>  {{number_format($row->post_price) . ' تومان '}} </td>
                
                @if($row->bank_id == 1)
                	<td>  آیدیپی </td>
                @else
                        <td>  نکست پی </td>
                @endif            
                <td>  {{@$row->orderStatus->title}} </td>
                
            </tr>
            
        @endforeach
    </tbody>
</table>
