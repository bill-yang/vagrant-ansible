# -*- mode: ruby -*-
# vi: set ft=ruby :
#
Vagrant.configure(2) do |config|
    # - Official Ubuntu 18.04 LTS Bionic Beaver
    config.vm.box = "ubuntu/bionic64"
    config.vm.hostname = "vagrant-dev-server"
    config.vm.network :private_network, ip: "192.168.56.201"
    config.ssh.insert_key = false

    # - do not sync the default vagrant directory
    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.synced_folder "docker/", "/var/docker/"
    # www contains web applications
    config.vm.synced_folder "www/", "/var/www/"
    # logs path
    config.vm.synced_folder "log/", "/var/log/", owner: "www-data", group: "www-data", mount_options: ["dmode=775", "fmode=666"] 

    # - configure the virtualbox provider
    config.vm.provider :virtualbox do |v|
        v.name = "vagrant-dev-server"
        v.memory = 4096
        v.cpus = 2
    end

    # - inline shell provision to set local time
    config.vm.provision :shell, :inline => "sudo ln -sf /usr/share/zoneinfo/Canada/Pacific /etc/localtime", run: "always"
  
    # - enable provisioning with Ansible
    config.vm.provision :ansible do |ansible|
        ansible.config_file = "ansible/ansible.cfg"
        ansible.playbook = "ansible/playbooks/provision-vagrant.yml"
    end
end
