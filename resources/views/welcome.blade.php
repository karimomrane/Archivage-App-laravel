
@php
    $products = App\Models\Fournisseur::all();
@endphp
    <div class="container p-5" style="display: inline-block;"> 
        <div id="piechart" style="width: 900px; height:500px;  position:absolute;left:0%;top:0%;"></div>
        <div id="piechart2" style="width: 900px; height:500px; position:absolute;right:0%;top:0%;"></div>
    </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Product Name', 'Sales', 'Quantity'],

                @php
                
                foreach($products as $product) {
                  
                    echo "['".$product->nom."', ".App\Models\Facture::where('code_fournisseur',$product->id)->count().", ".App\Models\Facture::where('code_fournisseur',$product->id)->sum('montant')."],";
                }
                @endphp
        ]);

          var options = {
            title: 'Factures Par Fournisseurs',
            is3D: false,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>
      
      
    
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {

        var data = google.visualization.arrayToDataTable([
            ['Product Name', 'Sales', 'Quantity'],

                @php
                
                foreach($products as $product) {
                  
                    echo "['".$product->nom."', ".App\Models\Facture::where('code_fournisseur',$product->id)->sum('montant').", ".App\Models\Facture::where('code_fournisseur',$product->id)->count()."],";
                }
                @endphp
        ]);

          var options = {
            title: 'Montants Total Des Factures Par Fournisseurs',
            is3D: false,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

          chart.draw(data, options);
        }
      </script>
