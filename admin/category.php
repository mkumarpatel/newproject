<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                        <table id="example" class="table table-striped">
                <!-- <table class="content-table"> -->
                    <thead>
                        <th class="bg-dark text-white fs-4">S.No.</th>
                        <th class="bg-dark text-white fs-4" >Category Name</th>
                        <th class="bg-dark text-white fs-4" >No. of Posts</th>
                        <th class="bg-dark text-white fs-4" >Edit</th>
                        <th class="bg-dark text-white fs-4" >Delete</th>
                    </thead>

                     <tbody>
                       
                        <tr>
                            <td></td>
                            <td></td>
                            <td class='edit'><a href='update-category.php'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                    

                       <thead>
                    </tbody>

                </table>
                
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
