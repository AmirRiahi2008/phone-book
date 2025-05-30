<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= siteUri("assets/css/bootstrap.min.css") ?> " />
    <link rel="stylesheet" href="<?= siteUri("assets/css/all.min.css") ?> " />
    <link rel="stylesheet" href="<?= siteUri("assets/css/index_style.css") ?> " />
</head>

<body>
    <div class="jumbotron jum">
        <div class="navbar">
            <h3>Phone Book <i class="far fa-address-book"></i></h3>
        </div>

        <div class="pagination"
            style="display: flex ; gap: .6rem; justify-content: center; align-items: center; margin-left: 32%; margin-bottom: 1rem;border-radius:10px;">
            <a href="?page=<?= $curPage > 1 ? $curPage - 1 : 1 ?>"
                style="color: black; float: left; padding: 8px 16px; text-decoration: none; background-color : white;border-radius:10px;">&laquo;</a>

            <!-- Pagination numbers removed (were dynamically generated via PHP) -->
            <?php for ($i = 1; $i <= $lastPage; $i++): ?>
                <a href="<?= siteUri("?page=$i") ?>"
                    style="color: black; float: left; padding: 8px 16px; text-decoration: none; background-color : white;border-radius:10px;"><?= $i ?></a>
            <?php endfor ?>
            <a href="?page=<?= $curPage < $lastPage ? $curPage + 1 : $lastPage ?>"
                style="color: black; float: left; padding: 8px 16px; text-decoration: none; background-color : white;border-radius:10px;">&raquo;</a>
        </div>

        <div class="row">
            <div class="col-lg-4 inp">
                <form action="" method="get">
                    <input onkeyup="searchFunction()" name="search" id="myInput" class="form-control mt-2"
                        placeholder="Search and Enter">
                    <span class="icon text-primary"><i class="fas fa-search"></i></span>
                </form>

                <h5 class="mt-4">Add New Contact</h5>
                <form action="<?= siteUri("contact/add") ?>" method="post">
                    <input name="name" class="form-control mb-3 mt-3" placeholder="add name" id="userName">
                    <input name="mobile" class="form-control mb-3" placeholder="add phone" id="userPhone">
                    <input name="email" class="form-control mb-3" placeholder="add e-mail" id="userEmail">
                    <button type="submit" class="btn btn-info w-100 btn1">Add</button>
                </form>
            </div>

            <div class="col-lg-8">
                <table id="myTable" class="table text-justify table-striped">
                    <thead class="tableh1">
                        <th class="">id</th>
                        <th class="">Name</th>
                        <th class="">Phone</th>
                        <th class="">E-mail</th>
                        <th class="col-1">delete</th>
                        <th class="col-1"></th>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Contacts were dynamically generated via PHP. Removed for static version -->

                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td class=""><?= $contact["id"] ?></td>
                                <td class=""><?= $contact["name"] ?></td>
                                <td class=""><?= $contact["mobile"] ?></td>
                                <td class=""><?= $contact["email"] ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                        href="<?= siteUri("contact/delete/{$contact["id"]}") ?>  ">
                                        🗑
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <!-- Add more static rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="text-center">Amirreza Riahi 2025. All rights reserved</footer>

    <script src="<?= siteUri("assets/js/jquery-3.3.1.min.js") ?>"></script>
    <script src="<?= siteUri("assets/js/popper.min.js") ?> "></script>
    <script src=" <?= siteUri("assets/js/bootstrap.min.js") ?> "></script>
    <!-- <script src="assets/js/index.js"></script> -->
</body>

</html>