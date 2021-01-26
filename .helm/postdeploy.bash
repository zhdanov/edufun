#!/bin/bash

if ! grep -q "# edufun" $HOME/.bashrc; then
    echo "# edufun" >> $HOME/.bashrc
    echo 'alias ef="k -n edufun-prod exec -it edufun-prod-0 -c php-cli -- /root/edufun/ef"' >> $HOME/.bashrc

    echo "added ef alias to .bashrc"
fi
