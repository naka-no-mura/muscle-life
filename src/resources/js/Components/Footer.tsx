import { Link } from "@inertiajs/react";

export default function Footer() {
    return (
        <div className="flex justify-between text-gray-900 dark:text-gray-100 p-2 bg-gray-500">
            <Link className="rounded-full border-solid border-2 p-2 w-11 h-11 flex items-center justify-center" href={"/trainings"}>
                <i className="text-2xl fa-solid fa-gear"></i>
            </Link>
            <Link className="rounded-full border-solid border-2 p-2 w-11 h-11 flex items-center justify-center" href={"/dashboard"}>
                <i className="text-2xl fa-solid fa-calendar-days"></i>
            </Link>
            <Link className="rounded-full border-solid border-2 p-2 w-11 h-11 flex items-center justify-center" href={"/profile"}>
                <i className="text-2xl fa-solid fa-user"></i>
            </Link>
        </div>
    );
}
