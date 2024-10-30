<?php
    $currentDir = '/components/contact_us/';
?>

<link rel="stylesheet" href="<?php echo $currentDir . 'contact_us.css'?>">

<div class="contact-us-container">
    <h1 class="contact-us-title">
        <?php echo $contactUs['title'] ?>
    </h1>

    <div class="contact-us-content">
        <div class="contact-us-info">
            <div class="contact-us-phone">
                <?php echo $contactUs['info']['phone'] ?>
            </div>
            <div class="contact-us-email">
                <?php echo $contactUs['info']['email'] ?>
            </div>
            <div class="contact-us-address">
                <?php echo $contactUs['info']['address'] ?>
            </div>
        </div>
        <div class="contact-us-form">
            <form id="contact-form" action="<?php echo $currentDir . 'send_email.php'?>" method="POST">
                <?php foreach ($contactUs['form']['fields'] as $key => $field): ?>
                    <label for="<?php echo $key; ?>">
                        <?php echo $field['label']; ?>
                        <?php if ($field['required']): ?>
                            <span class="required-field">
                                <?php echo $contactUs['form']['requiredLabel']; ?>
                            </span>
                        <?php endif; ?>
                    </label>

                    <?php if ($key === 'message'): ?>
                        <textarea
                            id="<?php echo $key; ?>"
                            name="<?php echo $key; ?>"
                            class="contact-us-message"
                            rows="5"
                            <?php echo $field['required'] ? 'required' : ''; ?>
                        ></textarea>
                    <?php else: ?>
                        <input
                            type="<?php echo $field['type']; ?>"
                            id="<?php echo $key; ?>"
                            name="<?php echo $key; ?>"
                            <?php echo $field['required'] ? 'required' : ''; ?>
                        >
                    <?php endif; ?>
                <?php endforeach; ?>
                <input
                class="button-1"
                type="submit"
                value="<?php echo $contactUs['form']['button']['text']; ?>"
                >
            </form>
        </div>
    </div>
</div>

<script src="<?php echo $currentDir . 'set_required_message.js'?>"></script>