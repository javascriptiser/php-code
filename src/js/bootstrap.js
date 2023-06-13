import {initSelect} from "./select_module/index.mjs";

bootstrap = () => {
    $(document).ready(function () {
        initSelect("/api/select/init/");
    });
}


bootstrap();