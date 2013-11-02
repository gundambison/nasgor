<div class='bgmenu'>
</div> 
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" >
      <div class="container">
         <div style="padding:5px;border:1px solid #ddd;width:100%" class='myMenu'>
		<a href="#" class="easyui-linkbutton" data-options="plain:true">Home</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm0' ">Master File</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm1' ">Produk</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm2' ">Invoice</a> 
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm3' ">Laporan</a> 
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm4' ">Utility</a> 
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm5' ">History</a> 
	</div>
	<div id="mm0" style="width:200px">
		<div  
		onclick="openTab('Suplier','suplierList')">Suplier</a></div>
		<div  
		onclick="openTab('Store','storeList')">Toko</a></div>
		<div  
		onclick="openTab('Pelanggan','customerList')">Pelanggan</a></div>
		<div class="menu-sep"></div>
		<div  
		onclick="openTab('Currency','kursList')">Kurs</a></div>
	</div>
	<div id="mm1" style="width:200px">
		<div  
		onclick="openTab('Produk','itemList')">Produk</a></div>
		<div  
		onclick="openTab('Produk Stock','stockList')">Stock Edit</a></div>
		<div class="menu-sep"></div>
		<div  
		onclick="openTab('Merk','merkList')">Merk</a></div>
		<div  onclick="openTab('Kategori','categoryList')">Kategori</a></div> 
		<div class="menu-sep"></div>
		<div  
		onclick="openTab('Transfer Stock','stockTrans')">Transfer Stock</a></div>
	</div>
	<div id="mm2" style="width:200px">
		<div onclick="openTab('Penjualan','salesList')">Penjualan </a></div>
		<div onclick="openTab('Pembayaran Penjualan','paymentList')">Pembayaran Penjualan</a></div>
		<div onclick="openTab('Retur Penjualan','saleReturPaymentList')">Retur Penjualan</a></div>
		<div class="menu-sep"></div>
		<div onclick="openTab('Pembelian','purchaseList')">Pembelian</a></div>
		<div onclick="openTab('Penerimaan Barang','purchaseReceiveList')">Penerimaan Barang</a></div>
		<div onclick="openTab('Pembayaran Pembelian','paymentPurchaseList')">Pembayaran Pembelian</a></div>
		<div onclick="openTab('Retur Pembelian','returPurchaseList')">Retur Pembelian</a></div>
		
	</div>
	<div id="mm3" style="width:200px">
		<div onclick="openTab('laporan penjualan','tes1.txt')">Laporan Penjualan</a></div>
	</div>
	<div id="mm4" style="width:200px">
		<div onclick="openTab('User','user')">User Detail </a></div>
		<div onclick="openTab('User Permision','user_permision')">User Permision </a></div>
		<div class="menu-sep"></div>
		<div onclick="openTab('Tab','user_tab')">User Tab </a></div>
	</div>
	<div id="mm5" style="width:200px">
		<div onclick="openTab('History Admin','tes1.txt')">Admin</a></div>
		<div onclick="openTab('History Stock','tes1.txt')">Stock</a></div>
	</div>
	
      </div>
    </div>
<script>
function openTab(title, url)
{
	window.location.href ="<?=my_url();?>"+url;
}
</script>