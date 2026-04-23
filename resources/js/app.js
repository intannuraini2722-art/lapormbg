import './bootstrap';
import $ from 'jquery';
import DataTable from 'datatables.net-dt';
import Alpine from 'alpinejs';


window.$ = window.jQuery = $;
// Inisialisasi DataTable ke window agar bisa dipanggil di Blade
window.DataTable = DataTable;

window.Alpine = Alpine;
Alpine.start();
