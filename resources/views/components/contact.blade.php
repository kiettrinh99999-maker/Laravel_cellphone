@once
    @push('scripts')
        <script src="https://cdn.ckeditor.com/4.21.0/full-all/ckeditor.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                CKEDITOR.replace('{{ $id ?? 'content' }}', {
                    extraPlugins: 'base64image'
                });
            });
        </script>
    @endpush
@endonce
