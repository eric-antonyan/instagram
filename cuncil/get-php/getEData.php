<?php

require "functions.php";

$_sql = "SELECT * FROM `id` WHERE view_status_secretary=1 ORDER BY id";
$_res = q($_sql);
$output = '';

while ($td = mysqli_fetch_assoc($_res)) {
    $output .= '
    '.ini_get("session.gc_maxlifetime").'
    <tr>
                            <td>'.$td['id'].'</td>
                            <td>'.$td['name'].'</td>
                            <td>'.$td['email'].'</td>
                            <td>'.$td['message'].'</td>
                            <td>'.show_time($td['created_at']).'</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="get-php/actions.php?m_dmessage='.$td['id'].'" class="btn btn-danger">Հեռացնել</a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal'.$td['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel'.$td['id'].'" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Զգուշացում</h5>
                                        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Համաձա՞յն եք, որ նամակը տեսնի ավագանին։
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" aria-label="Close" data-bs-dismiss="modal">Ոչ</button>
                                        <a href="get-php/actions.php?pmessage='.$td['id'].'" type="button" class="btn btn-success">Այո</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $("#showPopup'.$td['id'].'").on("click", function() {
                                    $("#exampleModal'.$td['id'].'").modal("show");
                                })
                            });
                        </script>
    ';

}
echo $output;
