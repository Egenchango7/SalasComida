<div class="loading">
    <div class="circleLogo flex">
        <img src="{{ asset('src/SWOA_White.png') }}" alt="logoLoad">
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        style="margin: auto; background: white; display: block; shape-rendering: auto;" viewBox="0 0 100 100"
        preserveAspectRatio="xMidYMid">
        <circle cx="84" cy="50" r="10" fill="#ea4335">
            <animate attributeName="r" repeatCount="indefinite" dur="0.5s" calcMode="spline" keyTimes="0;1"
                values="10;0" keySplines="0 0.5 0.5 1" begin="0s"></animate>
            <animate attributeName="fill" repeatCount="indefinite" dur="2s" calcMode="discrete"
                keyTimes="0;0.25;0.5;0.75;1" values="#ea4335;#008000;#ff0000;#7cb342;#ea4335" begin="0s"></animate>
        </circle>
        <circle cx="16" cy="50" r="10" fill="#ea4335">
            <animate attributeName="r" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="0s"></animate>
            <animate attributeName="cx" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="0s">
            </animate>
        </circle>
        <circle cx="50" cy="50" r="10" fill="#7cb342">
            <animate attributeName="r" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.5s">
            </animate>
            <animate attributeName="cx" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.5s">
            </animate>
        </circle>
        <circle cx="84" cy="50" r="10" fill="#ff0000">
            <animate attributeName="r" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1s">
            </animate>
            <animate attributeName="cx" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1s">
            </animate>
        </circle>
        <circle cx="16" cy="50" r="10" fill="#008000">
            <animate attributeName="r" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="0;0;10;10;10" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1.5s">
            </animate>
            <animate attributeName="cx" repeatCount="indefinite" dur="2s" calcMode="spline" keyTimes="0;0.25;0.5;0.75;1"
                values="16;16;16;50;84" keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" begin="-1.5s">
            </animate>
        </circle>
    </svg>
</div>