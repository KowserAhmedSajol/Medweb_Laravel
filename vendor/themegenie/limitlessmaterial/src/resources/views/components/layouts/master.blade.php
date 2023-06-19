<!DOCTYPE html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
<head>
    <x-sg-meta />
    <x-sg-title/>
    <x-sg-favicon />
    <x-sg-style />
</head>

<body>
    <x-sg-navbar />


	<!-- Page content -->
	<div class="page-content">

        <x-sg-sidebar />

		<!-- Main content -->
		<div class="content-wrapper">


            <div class="content">
                {{ $slot }}
            </div>

            <x-sg-footer />
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

    <x-sg-js />
</body>
</html>