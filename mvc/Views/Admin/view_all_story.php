<div class="p-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Story</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class='m-0' method="post" enctype="multipart/form-data">
            <div style="border: 2px solid #dee2e6; border-radius:5px;">
                <div class="input-group">
                    <span class="input-group-text" style="background-color:transparent; border:none;">
                        <img src="../mvc/Assets/images/search.png" height="15px">
                    </span>
                    <input type="text" name="search" placeholder="search" class="form-control" style="border:none;border-radius:5px;background-color:transparent;">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table" style="border: 1px solid #dee2e6;">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Story Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Full Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($storys as $story) {
                        ?>
                            <tr>
                                <td class="p-3 pe-0" style="font-size:13px;"><?php echo $story->story_title; ?></td>
                                <td class="p-3 pe-0" style="font-size:13px;"><?php echo $story->first_name . ' ';
                                                                                echo $story->last_name; ?></td>
                                <td class="p-3 pe-0" style="font-size:13px;"><?php echo $story->mission_title; ?></td>
                                <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                    <a href="story?source=view_story&view=<?php $id = $story->story_id;
                                                                            $salt = "SECRET_STUFF";
                                                                            $encrypted_id = base64_encode($id . $salt);
                                                                            echo $encrypted_id; ?>" class='col-example13' style='background-color: white;'>View</a>
                                    <a onClick="javascript:return confirm('Are you sure to change status to approve?');" href="story?source=approve_story&edit=<?php $id = $story->story_id;
                                                                                                                                                                $salt = "SECRET_STUFF";
                                                                                                                                                                $encrypted_id = base64_encode($id . $salt);
                                                                                                                                                                echo $encrypted_id; ?>"><i class='fa fa-check-circle-o pe-2' style='color: #14c506;' aria-hidden='true'></i></a>
                                    <a onClick="javascript:return confirm('Are you sure to change status to decline?');" href="story?source=decline_story&edit=<?php $id = $story->story_id;
                                                                                                                                                                $salt = "SECRET_STUFF";
                                                                                                                                                                $encrypted_id = base64_encode($id . $salt);
                                                                                                                                                                echo $encrypted_id; ?>"><i class='fa fa-times-circle-o text-danger pe-2' aria-hidden='true'></i></a>
                                    <a onClick="javascript:return confirm('Are you sure to delete?');" href="story?source=delete_story&delete=<?php $id = $story->story_id;
                                                                                                                                                $salt = "SECRET_STUFF";
                                                                                                                                                $encrypted_id = base64_encode($id . $salt);
                                                                                                                                                echo $encrypted_id; ?>"><i class='fa fa-trash-o text-dark' aria-hidden='true'></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php if (!isset($_POST['search'])) { ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pager justify-content-end">
                            <?php
                            $next = $page + 1;
                            $previous = $page - 1;
                            echo "<li class='page-item'><a class='page-link' href='story?page=1' style='border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;'><img src='../mvc/Assets/images/previous.png' alt=''></a></li>";
                            if ($previous >= 1)
                                echo "<li class='page-item'><a class='page-link' href='story?page=$previous' style='border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;'><img src='../mvc/Assets/images/left.png' alt=''></a></li>";
                            else
                                echo "<li class='page-item'><a class='page-link' href='story?page=1' style='border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;'><img src='../mvc/Assets/images/left.png' alt=''></a></li>";
                            for ($i = 1; $i <= $cnt; $i++) {
                                if ($i == $page)
                                    echo "<li class='page-item'><a class='page-link active text-center' href='story?page=$i' style='border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px;'><b>$i</b></a></li>";
                                else
                                    echo "<li class='page-item'><a class='page-link text-center' href='story?page=$i' style='border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px; color:black;'>$i</a></li>";
                            }
                            if ($next <= $cnt)
                                echo "<li class='page-item'><a class='page-link' href='story?page=$next' style='border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;'><img src='../mvc/Assets/images/arrow.png' alt=''></a></li>";
                            else
                                echo "<li class='page-item'><a class='page-link' href='story?page=$cnt' style='border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;'><img src='../mvc/Assets/images/arrow.png' alt=''></a></li>";
                            echo "<li class='page-item'><a class='page-link' href='story?page=$cnt' style='border-radius:5px; padding:10px; height:30px; width:30px; margin:4px;'><img src='../mvc/Assets/images/next.png' alt=''></a></li>";
                            ?>
                        </ul>
                    </nav>
                <?php } ?>
            </div>
        </div>
    </div>
</div>