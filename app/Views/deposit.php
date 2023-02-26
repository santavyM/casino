<?=$this->extend("layout/master")?>

<?=$this->section("content")?>
<div class="d-flex align-items-center h-75">
  <div class="card mx-auto bg-dark text-white" style="width:1100px">
  <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modal">
          Deposit
        </button>

        <!-- Modal -->
        <div class="modal h-50" tabindex="-1" id="modal">
          <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
              <div class="modal-header">
                <h5 class="modal-title">Deposit</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body bg-dark text-white" id="focus">
              <?= form_open('/Casino/check_form');?>
            <?= form_label(' ')?>
            <?= form_input('hodnota','',['placeholder'=>'hodnota', 'class'=>'form-control'],'cislo') ?><br>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <?= form_label(' ')?>
                <input type="submit" value="odeslat" class="btn btn-success">
            <?= form_close()?>
              </div>
            </div>
          </div>
        </div>


<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading("id", "datum", "množství", "transakce");
foreach ($deposit as $row) {
    $radek = array($row->id, $row->datum, $row->hodnota, $row->transakce);
    $table->addRow($radek);
}

$template = [
    'table_open' => '<table class="table text-white">',
    'thead_open' => '<thead>',
    'thead_close' => '</thead>',
    'heading_row_start' => '<tr>',
    'heading_row_end' => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end' => '</th>',
    'tfoot_open' => '<tfoot>',
    'tfoot_close' => '</tfoot>',
    'footing_row_start' => '<tr>',
    'footing_row_end' => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end' => '</td>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end' => '</tr>',
    'cell_start' => '<td>',
    'cell_end' => '</td>',
    'row_alt_start' => '<tr>',
    'row_alt_end' => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end' => '</td>',
    'table_close' => '</table>'
];

$table->setTemplate($template);
echo $table->generate();

?>
</div>
</div>
</div>
  </div>
  </div>
<?=$this->endSection()?>