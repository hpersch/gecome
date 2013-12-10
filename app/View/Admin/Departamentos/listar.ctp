<?php /* <div class="row">
  <div class="col-lg-12">
  <div class="col-lg-12">
  <section class="panel">
  <header class="panel-heading">
  Departamentos
  </header>
  <table class="table table-striped border-top" id="departamentos">
  <thead>
  <tr>
  <th>#</th>
  <th>Nome</th>
  <th>Sub-departamentos</th>
  <th></th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <?php foreach ($deptos as $depto) { ?>
  <tr>
  <td><?php echo $depto['Departamento']['id']; ?></td>
  <td><?php echo $depto['Departamento']['nome']; ?></td>
  <td><?php echo count($depto['SubDepartamento']) ?></td>
  <td><a href="<? echo $this->base ?>/admin/departamentos/editar/<?php echo $depto['Departamento']['id']; ?>">Editar</a> | <a href="<? echo $this->base ?>/admin/departamentos/excluir/<?php echo $depto['Departamento']['id']; ?>">Excluir</a></td>
  </tr>
  <?php } ?>
  </tr>
  </tbody>
  </table>
  </section>
  </div>
  </div>
  </div>
 * 
 */ ?>


<script src="<?= $this->webroot ?>adm/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#browserList').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?php echo $this->Html->Url(array('controller' => 'Grid', 'action' => 'ajaxData', 'departamentos')); ?>"
        });
    });
</script>

<h1>Browser List</h1>

<table id="browserList">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>   
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4" class="dataTables_empty">Loading data from server...</td>
        </tr>
    </tbody>
</table>
