export default function Header({ headerTitle }: {
    headerTitle?: string
}) {
    return (
        <>
            {headerTitle && (
                <div className="bg-white dark:bg-gray-800 shadow max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                    <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">{headerTitle}</h2>
                </div>
            )}
        </>
    );
}
