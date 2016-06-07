<?php echo $this->start('title'); ?>
Employee Lists
<?php echo $this->end(); ?>
<?php $this->Html->addCrumb('Employee Lists'); ?>

<div class="panel panel-default">
    <div class="panel-heading">Employee Lists</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr>
                        <th>Employee No</th>
                        <th>Username</th>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['Employee']['EmployeeNumber']; ?></td>
                        <td><?php echo $employee['Employee']['UserName']; ?></td>
                        <td><?php echo $employee['Position']['Name']; ?></td>
                        <td><?php echo ucwords($employee['Employee']['FirstName'].' '.$employee['Employee']['MiddleName'].' '.$employee['Employee']['LastName']); ?></td>
                        <td><?php echo $employee['Employee']['IsActive'] == 1 ? 'Active' : 'Inactive'; ?></td>
                        <td>
                            <a href="<?php echo $this->Html->Url(array('controller' => 'employee', 'action' => 'edit', $employee['Employee']['Id'])); ?>" class="btn btn-sm btn-default">Edit</a>
                            <?php if($employee['Employee']['IsActive'] == 1): ?>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#changestateModal" data-href="<?php echo $this->Html->Url(array('controller' => 'employee', 'action' => 'activate', 'id' => $employee['Employee']['Id'], 'act' => 'deactivate')); ?>">Deactivate</button>
                            <?php else: ?>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#changestateModal" data-href="<?php echo $this->Html->Url(array('controller' => 'employee', 'action' => 'activate', 'id' => $employee['Employee']['Id'], 'act' => 'activate')); ?>">Activate</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer">
        <a href="<?php echo $this->Html->Url(array('controller' => 'employee', 'action' => 'add')); ?>" class="btn btn-success">Add Employee</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changestateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
</div>
<!-- end Modal -->

<?php echo $this->start('footerScripts'); ?>
<script type="text/javascript">
$('.data-table').dataTable();

$('button[data-toggle="modal"]').each(function(){
    $(this).click(function(){
        $($(this).attr('data-target')).load($(this).attr('data-href'));
    });
});
</script>
<?php echo $this->end(); ?>