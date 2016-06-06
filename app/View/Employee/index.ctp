<?php echo $this->start('title'); ?>
Account Information
<?php echo $this->end(); ?>
<?php $this->Html->addCrumb('My Account'); ?>

<div class="panel panel-default">
    <div class="panel-heading">My Account Information</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Employee Information</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>Employee Number</td>
                            <td> : </td>
                            <td>01</td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td> : </td>
                            <td>DM17</td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td> : </td>
                            <td>Web Developer</td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td> : </td>
                            <td>Marketing</td>
                        </tr>
                        <tr>
                            <td>Office</td>
                            <td> : </td>
                            <td>Extension Office</td>
                        </tr>
                    </tbody>
                </table>
                
                <hr>
                
                <h4>Personal Information</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td> : </td>
                            <td>Dan Mark P. Lagman</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td> : </td>
                            <td>Male</td>
                        </tr>
                    </tbody>
                </table>
                
                <hr>
                
                <h4>Contact Information</h4>
                <table>
                    <tbody>
                        <tr>
                            <td>Phone Number</td>
                            <td> : </td>
                            <td>09053561120</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td> : </td>
                            <td>danmarklagman@outlook.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a href="#" class="btn btn-success"><i class="fa fa-pencil fa-fw"></i> Update</a>
    </div>
</div>
