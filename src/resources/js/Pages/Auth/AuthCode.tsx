import { useEffect, FormEventHandler } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        auth_code: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route('verify.auth.code'));
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="number" value="認証コード" />

                    <TextInput
                        id="auth_code"
                        name="auth_code"
                        value={data.auth_code}
                        className="mt-1 block w-full"
                        autoComplete="auth_code"
                        isFocused={true}
                        onChange={(e) => setData('auth_code', e.target.value)}
                        required
                    />

                    <InputError message={errors.auth_code} className="mt-2" />
                </div>
            </form>
        </GuestLayout>
    );
}
