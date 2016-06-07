<?php echo $this->start('title'); ?>
Update Employee
<?php echo $this->end(); ?>
<?php $this->Html->addCrumb('Employee', array('controller' => 'employee', 'action' => 'index')); ?>
<?php $this->Html->addCrumb('Edit'); ?>

<div class="panel panel-default">
    <div class="panel-heading">Update Employee</div>
    <div class="panel-body">
        <?php echo $this->Form->create('Employee', array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'employeeEditForm', 'url' => array('controller' => 'employee', 'action' => 'doEdit'))); ?>
        <?php echo $this->Form->input('Id', array('type' => 'hidden')); ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Employee Number</label>
            <?php echo $this->Form->input('EmployeeNumber', array(
                'class' => 'form-control', 
                'placeholder' => 'Employee Number',
                'disabled' => 'disabled',
                'div' => array('class' => 'col-sm-10'),
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">User Name</label>
            <?php echo $this->Form->input('UserName', array(
                'class' => 'form-control', 
                'placeholder' => 'Employee Number',
                'disabled' => 'disabled',
                'div' => array('class' => 'col-sm-10'),
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Job Position</label>
            <div class="col-sm-10">
                <select class="form-control" name="data[Employee][PositionId]">
                    <option value="">Select Position</option>
                    <?php foreach ($positions as $position): ?>
                    <option <?php $position['Position']['Id'] == $employee['PositionId'] ? 'selected' : ''; ?> value="<?php echo $position['Office']['Id'] ?>"><?php echo $position['Office']['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php 
            echo $this->Form->submit('Update', array(
                'class' => 'btn btn-success',
                'div' => false));
        ?>
        <a href="<?php echo $this->Html->Url(array('controller' => 'employee', 'action' => 'index')); ?>" class="btn btn-default">Cancel</a>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div id="editTarget"></div>
<?php echo $this->start('footerScripts'); ?>
<script>
$('#employeeEditForm').UpdateData('#editTarget');
</script>
<?php echo $this->end(); ?>