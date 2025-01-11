<div class="wrap">
    <h1>Entertainment Plugin Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields( 'entertainment_plugin_settings' );
        do_settings_sections( 'entertainment-settings' );

        // This is where you render your admin page
        echo '<div class="wrap">';
        echo "<p>Hello Rabi from Admin Page</p>";
        echo '</div>';

        submit_button();
        ?>
    </form>
</div>
