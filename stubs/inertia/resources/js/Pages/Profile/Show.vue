<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                 <div v-if="$page.jetstream.canUpdateProfileInformation">
                    <update-profile-information-form :user="$page.user" />

                    <jet-section-border />
                </div>

                <div v-if="$page.jetstream.canUpdatePassword && $page.socialstream.hasPassword">
                    <update-password-form class="mt-10 sm:mt-0" />

                    <jet-section-border />
                </div>

                <div v-else>
                    <set-password-form class="mt-10 sm:mt-0" />

                    <jet-section-border />
                </div>

                <div v-if="$page.jetstream.canManageTwoFactorAuthentication && $page.socialstream.hasPassword">
                    <two-factor-authentication-form class="mt-10 sm:mt-0" />

                    <jet-section-border />
                </div>

                <div v-if="$page.socialstream.show">
                    <connected-accounts-form class="mt-10 sm:mt-0" />
                </div>

                <div v-if="$page.socialstream.hasPassword">
                    <jet-section-border />

                    <logout-other-browser-sessions-form  :sessions="sessions" class="mt-10 sm:mt-0" />
                </div>

                <div v-if="$page.socialstream.hasPassword">
                    <jet-section-border />

                    <delete-user-form class="mt-10 sm:mt-0" />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import DeleteUserForm from './DeleteUserForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
    import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
    import SetPasswordForm from './SetPasswordForm'
    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'
    import ConnectedAccountsForm from './ConnectedAccountsForm';

    export default {
        props: ['sessions'],

        components: {
            ConnectedAccountsForm,
            AppLayout,
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            SetPasswordForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },
    }
</script>
