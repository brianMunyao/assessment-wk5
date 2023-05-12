<?php
global $wpdb;

$trainees = $wpdb->get_results("SELECT * FROM wp_trainees");
?>

<div class="container">
    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone Number</th>
        </tr>


        <?php
        for ($i = 0; $i < count($trainees); $i++) {
        ?>

            <tr>
                <td><?php echo $trainees[$i]->name ?></td>
                <td><?php echo $trainees[$i]->email ?></td>
                <td><?php echo $trainees[$i]->phone ?></td>
            </tr>
        <?php
        }

        ?>

    </table>

</div>