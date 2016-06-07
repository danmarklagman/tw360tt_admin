<?php echo $this->start('title'); ?>
Add Employee
<?php echo $this->end(); ?>
<?php $this->Html->addCrumb('Employee', array('controller' => 'employee', 'action' => 'index')); ?>
<?php $this->Html->addCrumb('Add'); ?>

<div class="panel panel-default">
    <div class="panel-heading">Add Employee</div>
    <div class="panel-body">
        <?php echo $this->Form->create('Employee', array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'employeeAddForm', 'url' => array('controller' => 'employee', 'action' => 'doAdd'))); ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Employee Number</label>
            <?php echo $this->Form->input('EmployeeNumber', array(
                'class' => 'form-control', 
                'placeholder' => 'Employee Number', 
                'div' => array('class' => 'col-sm-10'),
                'required' => 'required',
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">User Name</label>
            <?php echo $this->Form->input('UserName', array(
                'class' => 'form-control', 
                'placeholder' => 'User Name', 
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
                    <option value="<?php echo $position['Position']['Id'] ?>"><?php echo $position['Position']['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Department</label>
            <div class="col-sm-10">
                <select class="form-control" name="data[Employee][DepartmentId]">
                    <option value="">Select Department</option>
                    <?php foreach ($departments as $department): ?>
                    <option value="<?php echo $department['Department']['Id'] ?>"><?php echo $department['Department']['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Office</label>
            <div class="col-sm-10">
                <select class="form-control" name="data[Employee][OfficeId]">
                    <option value="">Select Office</option>
                    <?php foreach ($offices as $office): ?>
                    <option value="<?php echo $office['Office']['Id'] ?>"><?php echo $office['Office']['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">First Name</label>
            <?php echo $this->Form->input('FirstName', array(
                'class' => 'form-control', 
                'placeholder' => 'First Name', 
                'div' => array('class' => 'col-sm-10'),
                'required' => 'required',
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Middle Name</label>
            <?php echo $this->Form->input('MiddleName', array(
                'class' => 'form-control', 
                'placeholder' => 'Middle Name', 
                'div' => array('class' => 'col-sm-10'),
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Last Name</label>
            <?php echo $this->Form->input('LastName', array(
                'class' => 'form-control', 
                'placeholder' => 'Last Name', 
                'div' => array('class' => 'col-sm-10'),
                'required' => 'required',
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Gender</label>
            <?php echo $this->Form->input('Gender', array(
                'options' => array('' => 'Select Gender', 'Male' => 'Male', 'Female' => 'Female'),
                'class' => 'form-control',
                'required' => 'required',
                'div' => array('class' => 'col-sm-10'),
                'required' => 'required',
                'label' => false));
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Phone Number</label>
            <?php echo $this->Form->input('PhoneNumber', array(
                'class' => 'form-control', 
                'placeholder' => 'Phone Number', 
                'div' => array('class' => 'col-sm-10'),
                'label' => false)); 
            ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email Address</label>
            <?php echo $this->Form->input('EmailAddress', array(
                'class' => 'form-control', 
                'placeholder' => 'Email Address', 
                'div' => array('class' => 'col-sm-10'),
                'label' => false)); 
            ?>
        </div>
        <?php 
            echo $this->Form->submit('Add', array(
                'class' => 'btn btn-success',
                'div' => false));
        ?>
        <a href="<?php echo $this->Html->Url(array('controller' => 'employee', 'action' => 'index')); ?>" class="btn btn-default">Cancel</a>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div id="addTarget"></div>
<?php echo $this->start('footerScripts'); ?>
<script>
$('#employeeAddForm').AddData('#addTarget');
</script>
<?php echo $this->end(); ?>