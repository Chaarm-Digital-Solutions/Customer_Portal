<?php

return [
    'login' => [
        'email' => 'Email',
        'password' => 'Password',
        'remember_me' => 'Remember me',
        'forgot_password' => 'Forgot your password?',
        'login' => 'Log in',
    ],

    'register' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'confirm_password' => 'Confirm password',
        'disclaimer' => 'I agree to the :terms_of_service and :privacy_policy',
        'disclaimer_tos' => 'Terms of Service',
        'disclaimer_privacy' => 'Privacy Policy',
        'already_registered' => 'Already registered?',
        'register' => 'Register' 
    ],

    'navigation-menu' => [
        'dashboard' => 'Dashboard',
        'bills' => 'Bills',
        'payments' => 'Payments',
        'meter_reads' => 'Meter Reads',
        'manage_team' => 'Manage Team',
        'team_settings' => 'Team Settings',
        'create_new_team' => 'Create New Team',
        'switch_teams' => 'Switch Teams',
        'manage_account' => 'Manage Account',
        'profile' => 'Profile',
        'api_tokens' => 'API Tokens',
        'log_out' => 'Log out'
    ],

    'show' => [
        'profile' => 'Profile',
    ],
    
    'update-profile-information-form' => [
        'title' => 'Profile Information',
        'description' => 'Update your account\'s profile information and email address.',
        'photo' => 'Photo',
        'new_photo' => 'Select a new photo',
        'remove_photo' => 'Remove photo',
        'name' => 'Name',
        'email' => 'Email',
        'email_unverified' => 'Your email address is unverified.',
        'email_verify' => 'Click here to re-send the verification email.',
        'email_verify_sent' => 'A new verification link has been sent to your email address.',
        'saved' => 'Saved',
        'save' => 'Save'
    ],

    'update-password-form' => [
        'title' => 'Update Password',
        'description' => 'Ensure your account is using a long, random password to stay secure.',
        'current_password' => 'Current Password',
        'new_password' => 'New Password',
        'confirm_password' => 'Confirm Password',
        'saved' => 'Saved.',
        'save' => 'Save'
    ],

    'two-factor-authentication-form' => [
        'title' => 'Two Factor Authentication',
        'description' => 'Add additional security to your account using two factor authentication.',
        'finish_enabling' => 'Finish enabling two factor authentication.',
        'enable_confirmation' => 'You have enabled two factor authentication.',
        'not_enabled' => 'You have not enabled two factor authentication.',
        'elaboration' => 'When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.',
        'code_prompt' => 'To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.',
        'confirmation' => 'Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.',
        'setup_key' => 'Setup key',
        'code' => 'Code',
        'codes_disclaimer' => 'Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.',
        'enable' => 'Enable',
        'regenerate' => 'Regenerate Recovery Codes',
        'confirm' => 'Confirm',
        'show' => 'Show Recovery Codes',
        'cancel' => 'Cancel',
        'disable' => 'Disable',
    ],

    'logout-other-browser-sessions-form' => [
        'title' => 'Browser Sessions',
        'description' => 'Manage and log out your active sessions on other browsers and devices.',
        'content' => 'If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.',
        'unknown' => 'Unknown',
        'this_device' => 'This device',
        'last_active' => 'Last active',
        'log_out' => 'Log Out Other Browser Sessions',
        'done' => 'Done.',
        'password_disclaimer' => 'Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.',
        'password' => 'Password',
        'cancel' => 'Cancel',
    ],

    'delete-user-form' => [
        'title' => 'Delete Account',
        'description' => 'Permanently delete your account.',
        'content' => 'Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.',
        'disclaimer' => 'Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',
        'password' => 'Password',
        'cancel' => 'Cancel',
    ],

    'update-user-password' => [
        'mismatch' => 'The provided password does not match your current password.',
    ],

    'bills' => [
        'title' => 'Bills',
    ],

    'dashboard' => [
        'title' => 'Dashboard',
    ],

    'payments' => [
        'title' => 'Payments',
    ],

    'reads' => [
        'title' => 'Meter Reads',
    ],

    'api-token-manager' => [
        'title' => 'Create API token',
        'description' => 'API tokens allow third-party services to authenticate with our application on your behalf.',
        'token_name' => 'Token name',
        'permissions' => 'Permissions',
        'created' => 'Created.',
        'create' => 'Create',
        'manage' => 'Manage API tokens',
        'manage_description' => 'You may delete any of your existing tokens if they are no longer needed.',
        'last_used' => 'Last Used',
        'delete' => 'Delete',
        'token' => 'API token',
        'token_disclaimer' => 'Please copy your new API token. For your security, it won\'t be shown again.',
        'close' => 'Close',
        'token_permissions' => 'API token permissions',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'token_delete' => 'Delete API Token',
        'delete_confirmation' => 'Are you sure you would like to delete this API token?',
    ],

    'index' => [
        'api_tokens' => 'API tokens',
    ],

    'confirm-password' => [
        'disclaimer' => 'This is a secure area of the application. Please confirm your password before continuing.',
        'confirm' => 'Confirm',
        'password' => 'Password',
    ],

    'forgot-password' => [
        'disclaimer' => 'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
        'email' => 'Email',
        'send_link' => 'Email Password Reset Link',
    ],

    'reset-password' => [
        'email' => 'Email',
        'password' => 'Password',
        'confirm_password' => 'Confirm password',
        'reset_password' => 'Reset password',
    ],

    'two-factor-challenge' => [
        'authentication_description' => 'Please confirm access to your account by entering the authentication code provided by your authenticator application.',
        'recovery_description' => 'Please confirm access to your account by entering one of your emergency recovery codes.',
        'code' => 'Code',
        'recovery_code' => 'Recovery code',
        'use_recovery' => 'Use a recovery code',
        'use_authentication' => 'Use an authentication code',
        'log_in' => 'Log in',
    ],

    'verify-email' => [
        'description' => 'Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.',
        'link_sent' => 'A new verification link has been sent to the email address you provided in your profile settings.',
        'link_resend' => 'Resend Verification Email',
        'edit_profile' => 'Edit profile',
        'log_out' => 'Log out',
    ],

    'confirms-password' => [
        'password_confirm' => 'Confirm password',
        'content' => 'For your security, please confirm your password to continue.',
        'password' => 'Password',
        'confirm' => 'Confirm',
        'cancel' => 'Cancel',
    ],

    'validation-errors' => [
        'error' => 'Whoops! Something went wrong.',
    ],

    'team-invitation' => [
        'invitation' => 'You have been invited to join the :team team!',
        'register' => 'If you do not have an account, you may create one by clicking the button below. After creating an account, you may click the invitation acceptance button in this email to accept the team invitation:',
        'create_account' => 'Create account',
        'register_accept' => 'If you already have an account, you may accept this invitation by clicking the button below:',
        'invite_accept' => 'You may accept this invitation by clicking the button below:',
        'accept' => 'Accept invitation',
        'discard' => 'If you did not expect to receive an invitation to this team, you may discard this email.',
    ],
];