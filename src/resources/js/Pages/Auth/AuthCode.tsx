import { useEffect, FormEventHandler } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        authCode: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="number" value="AuthCode" />

                    <TextInput
                        id="authCode"
                        name="authCode"
                        value={data.authCode}
                        className="mt-1 block w-full"
                        autoComplete="authCode"
                        isFocused={true}
                        onChange={(e) => setData('authCode', e.target.value)}
                        required
                    />

                    <InputError message={errors.authCode} className="mt-2" />
                </div>
            </form>
        </GuestLayout>
    );
}
