<?=$this->extend("layout/master")?>

<?=$this->section("content")?>    
<div class="d-flex align-items-center h-75">
  <div class="card mx-auto bg-dark text-white" style="width:1100px">
  <div class="card-body">

<table class="table text-white">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
    <th>Delete</th>
  </tr>
  <tr>
    <?php foreach ($hraci as $row) : ?>
    <td><?= $row->id ?></td>
    <td><?= $row->jmeno ?></td>
    <td><?= $row->prijmeni ?></td>
    <td><a data-id="<?= $row->id; ?>" class="delete-button btn btn-danger btn-sm">Delete</a></td> <!--href=" ('admin/delete/'.$row->id); ?>" -->
  </tr>
  <?php endforeach; ?>
</table>


<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading("id", "jmeno", "prijmeni", "smazat");
foreach ($hraci as $row) {
    $radek = array($row->id, $row->jmeno, $row->prijmeni);

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


?>

  </div>
  </div>
</div>

<script>
    $(document).on('click', '.delete-button', function() {
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Casino/delete') ?>",
            data: {id: id},
            success: function(response) {
                // Reload the page or update the table without the deleted row
            }
        });
    });
</script>
<?=$this->endSection()?>