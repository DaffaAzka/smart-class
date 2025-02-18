<footer class="bg-gray-100 text-gray-800 pt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8 py-8">
            <div class="md:col-span-2">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">SmartClass</h3>
                <p class="text-gray-600">
                    Empowering teams to achieve more through intelligent task management and seamless collaboration.
                </p>
            </div>

            <div>
                <h4 class="text-gray-900 font-semibold mb-4">Product</h4>
                <ul class="space-y-2">

                    @foreach ($sub_categories as $category)
                    <li><a href="#" class="hover:text-grey-600 transition-colors">{{ $category['name']  }}</a></li>
                    @endforeach

                </ul>
            </div>

            <div>
                <h4 class="text-gray-900 font-semibold mb-4">Company</h4>
                <ul class="space-y-2">

                    @foreach ($contacts as $contact)
                    <li><a href="#" class="hover:text-grey-600 transition-colors">{{ $contact['name'] }}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>

        <div class="border-t border-gray-300 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-600 text-center md:text-left mb-4 md:mb-0">
                    © 2025 Smartclass. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <!-- Social Icons -->
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <!-- Add more social icons -->
                </div>
            </div>
        </div>
    </div>
</footer>
