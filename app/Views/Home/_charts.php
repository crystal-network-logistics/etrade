<?php

function _converDT($month = 0){
    return strtotime(($month).' month');
}

function _getDate($month = 6){
    $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
    $arr = [];
    $current_month = date('m',time());
    $year = date('Y',time());
    $pos = find_by_array_flip($months,$current_month);

    for($i = 1;$i <= $month;$i++){
        if($pos - $i >= 0){
            $arr[] = $year.'-'.$months[($pos-$i)];
        }else{
            $arr[] = ($year-1).'-'.$months[12-($i-$pos)];
        }
    }
    $arr = array_reverse($arr);
    return $arr;
}

$m6 = _getDate(6);
?>

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title"> 报关与收入总额(USD)</h6>
    </div>
    <div class="panel-body">
        <div id="charts_1" style="height: 160px;"></div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title"> 报关与收入6个月趋势(USD)</h6>
    </div>
    <div class="panel-body">
        <div id="charts_2" style="height: 160px;"></div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title"> 增票与付款总额(RMB)</h6>
    </div>

    <div class="panel-body">
        <div id="charts_3" style="height: 160px;"></div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title"> 增票与付款6个月趋势(RMB)</h6>

    </div>

    <div class="panel-body panel-collapse collapse in">
        <div id="charts_4" style="height: 160px;"></div>
    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title"> 付款人与收款人排行</h6>

    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <div id="charts_5" style="height: 320px;"></div>
            </div>

            <div class="col-lg-6">
                <div id="charts_6" style="height: 320px;"></div>
            </div>
        </div>
    </div>
</div>


<script src="/resource/app/echarts.common.min.js"></script>
<script>
    var entry_chart_total,vii_chart_total,entry_chart_recently,vii_chart_recently,payer_charts_limit,receiver_charts_limit;
    var entry_total_columns = echarts.init(document.getElementById('charts_1')),
        charts_2_columns = echarts.init(document.getElementById('charts_2')),
        charts_3_columns = echarts.init(document.getElementById('charts_3')),
        charts_4_columns = echarts.init(document.getElementById('charts_4')),
        charts_5_columns = echarts.init(document.getElementById('charts_5')),
        charts_6_columns = echarts.init(document.getElementById('charts_6'))

    ;
    $(function(){
        load_data_charts();
    });

    function load_data_charts() {
        //comm.loadwait();
        comm.GET({
            url : "/data/census/charts",
            success : function(resp){
                entry_chart_total = resp.charts_entry.data;
                vii_chart_total = resp.charts_vii.data;
                entry_chart_recently = resp.charts_entry_recently;
                vii_chart_recently = resp.charts_vii_recently;
                payer_charts_limit = resp.charts_payer_limit.length ? resp.charts_payer_limit : [{name:'',value:0,c:0}];
                receiver_charts_limit = resp.charts_receiver_limit.length ? resp.charts_receiver_limit :[{name:'',value:0,c:0}] ;
                //comm.loadunblock();
                console.log(payer_charts_limit);
                init_charts();
            }
        });
    }

    function init_charts(){
        var m6 = <?php echo json_encode($m6)?>;


        var color = ["#2ec7c9", "#b6a2de", "#5ab1ef", "#ffb980", "#d87a80", "#8d98b3", "#e5cf0d", "#97b552", "#95706d", "#dc69aa", "#07a2a4", "#9a7fd1","#588dd5","#f5994e","#c05050","#59678c","#c9ab00","#7eb00a","#6f5553","#c14089"];

        var chart1_option = {
            color:color,
            tooltip : {
                trigger: 'axis'
            },
            grid: {
                top : '10px',
                left: '1%',
                right: '2%',
                bottom: '2%',
                containLabel: true
            },
            calculable : true,
            xAxis : [
                {type : 'value',
                    axisLabel: {
                        rotate: 10,
                    },
                }
            ],
            yAxis : [
                {
                    type : 'category',
                    data : ['总额']
                }
            ],
            series : [
                {
                    name:'报关(USD)',
                    type:'bar',
                    barWidth:20,
                    data:[entry_chart_total.bgamt]
                },
                {
                    name:'收入(USD)',
                    type:'bar',
                    barWidth:20,
                    data:[entry_chart_total.ramt]
                }
            ]
        };
        entry_total_columns.setOption(chart1_option);

        var bgamt = [],ramt = [];

        $.each(m6,function(dk,v){
            var o = 0,n = 0;
            $.each(entry_chart_recently,function(k,item){
                if(v == item.dt){
                    o = item.bgamt;
                    n = item.ramt;
                }
            });
            bgamt[dk] = o;
            ramt[dk] = n;
        });

        var chart2_option = {
            color:color,
            tooltip : {
                trigger: 'axis'
            },
            grid: {
                top : '10px',
                left: '1%',
                right: '2%',
                bottom: '2%',
                containLabel: true
            },

            xAxis : [{type : 'category', data : m6 }],
            yAxis : [{type : 'value'}],

            series : [
                {
                    name:'报关金额(USD)',
                    type:'line',
                    data:bgamt
                },
                {
                    name:'收入金额(USD)',
                    type:'line',
                    data:ramt
                }]
        };

        charts_2_columns.setOption(chart2_option);

        var chart3_option = {
            color:color,
            tooltip : {
                trigger: 'axis'
            },
            grid: {
                top : '10px',
                left: '1%',
                right: '2%',
                bottom: '2%',
                containLabel: true
            },
            calculable : true,
            xAxis : [
                {
                    type : 'value',
                    axisLabel: {
                        rotate: 10,
                    },
                }
            ],
            yAxis : [
                {
                    type : 'category',
                    data : ['总额']
                }
            ],
            series : [
                {
                    name:'增票(RMB)',
                    type:'bar',
                    barWidth:20,
                    data:[vii_chart_total.viiamt]
                },
                {
                    name:'付款(RMB)',
                    type:'bar',
                    barWidth:20,
                    data:[vii_chart_total.ramt]
                }
            ]
        };
        charts_3_columns.setOption(chart3_option);

        var viiamt = [],viiramt = [];

        $.each(m6,function(dk,v){
            var o = 0,n = 0;
            $.each(vii_chart_recently,function(k,item){
                if(v == item.dt){
                    o = item.viiamt;
                    n = item.ramt;
                }
            });
            viiamt[dk] = o;
            viiramt[dk] = n;
        });

        var chart4_option = {
            color:color,
            tooltip : {
                trigger: 'axis'
            },
            grid: {
                top : '10px',
                left: '1%',
                right: '2%',
                bottom: '2%',
                containLabel: true
            },
            xAxis : [{type : 'category', data : m6}],

            yAxis : [{type : 'value'}],

            series : [
                {
                    name:'增票(RMB)',
                    type:'line',
                    data:viiamt
                },
                {
                    name:'付款(RMB)',
                    type:'line',
                    data:viiramt
                }]
        };

        charts_4_columns.setOption(chart4_option);



        var chart5_option = {
            color:color,
            title : {
                text: '10大美金付款人',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                //orient : 'vertical',
                type:'scroll',
                x : 'left',
                y : 30
                //data:payer_charts_limit.map(function(v){return v.payername}),

            },

            calculable : true,
            series : [
                {
                    name:'付款人(USD)',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:payer_charts_limit
                }
            ]
        };

        charts_5_columns.setOption(chart5_option);

        var chart6_option = {
            color:color,
            title : {
                text: '10大收款人',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                type:'scroll',
                x : 'left',
                y : 30
            },

            calculable : true,
            series : [
                {
                    name:'收款人',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:receiver_charts_limit
                }
            ]
        };
        charts_6_columns.setOption(chart6_option);
        resize();

    }

    function resize() {
        window.onresize = function () {
            setTimeout(()=>{
                entry_total_columns.resize();
                charts_2_columns.resize();
                charts_3_columns.resize();
                charts_4_columns.resize();
                charts_5_columns.resize();
                charts_6_columns.resize();
            },200)
        }
    }
</script>
