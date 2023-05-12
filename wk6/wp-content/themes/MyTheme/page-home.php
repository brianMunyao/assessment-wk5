/*
Template Name: Main template
*/
<?php
global $wpdb;

$trainees = $wpdb->get_results("SELECT * FROM wp_trainees");
?>

<style>
    table,
    th,
    td {
        border: 1px solid grey;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px 15px;
    }
</style>

<div class="container">
    <h1>WordPress Trainees</h1>
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