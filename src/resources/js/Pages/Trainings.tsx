import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import { useState } from 'react';

type Training = {
    id: number;
    name: string
}

type Trainings = {
    chest: Array<Training>;
    shoulder: Array<Training>;
    back: Array<Training>;
    arm: Array<Training>;
    leg: Array<Training>;
}

export default function Trainings({ auth, trainings }: PageProps<{ trainings: Trainings }>) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            headerTitle="Training"
        >
            <Head title="Training" />


<div className="flex overflow-x-auto overflow-y-hidden border-b border-gray-200 whitespace-nowrap dark:border-gray-700">
    <Link href={'/trainings'}>
        <button className="text-gray-900 dark:text-gray-100 inline-flex items-center h-10 px-4 -mb-px text-sm text-center text-blue-600 bg-transparent border-b-2 border-blue-500 sm:text-base dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none">
            Training
        </button>
    </Link>

    <Link href={'/pfcs'}>
        <button className="text-gray-900 dark:text-gray-100 inline-flex items-center h-10 px-4 -mb-px text-sm text-center text-gray-700 bg-transparent border-b-2 border-transparent sm:text-base dark:text-white whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400">
            PFC
        </button>
    </Link>
</div>


            <div className='text-gray-900 dark:text-gray-100'>
                <p>胸</p>
                {trainings.chest.map(training => (
                    <div key={training.id}>{training.name}</div>
                ))}
            </div>

            <div className='text-gray-900 dark:text-gray-100'>
                <p>肩</p>
                {trainings.shoulder.map(training => (
                    <div key={training.id}>{training.name}</div>
                ))}
            </div>

            <div className='text-gray-900 dark:text-gray-100'>
                <p>背中</p>
                {trainings.back.map(training => (
                    <div key={training.id}>{training.name}</div>
                ))}
            </div>

            <div className='text-gray-900 dark:text-gray-100'>
                <p>腕</p>
                {trainings.arm.map(training => (
                    <div key={training.id}>{training.name}</div>
                ))}
            </div>

            <div className='text-gray-900 dark:text-gray-100'>
                <p>脚</p>
                {trainings.leg.map(training => (
                    <div key={training.id}>{training.name}</div>
                ))}
            </div>
        </AuthenticatedLayout>
    );
}
